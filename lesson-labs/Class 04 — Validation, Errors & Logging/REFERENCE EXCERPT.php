use Illuminate\Validation\ValidationException;
class PayTrackController {
 public function health(){try{DB::select('SELECT 1');return response()->json(['status'=>'ready','dependencies'=>['db'=>'ok']]);}catch(\Throwable $e){return response()->json(['status'=>'not_ready','dependencies'=>['db'=>'down']],503);}}
 public function register(Request $r){
  $v=$r->validate(['name'=>'required|string|min:2|max:120','email'=>'required|email|unique:users,email','password'=>'required|string|min:8']);
  $created=DB::transaction(function()use($v){
   $id=DB::table('users')->insertGetId(['name'=>$v['name'],'email'=>strtolower($v['email']),'password'=>Hash::make($v['password']),'role'=>'customer','created_at'=>now(),'updated_at'=>now()]);
   DB::table('wallets')->insert(['id'=>(string)Str::uuid(),'user_id'=>$id,'currency'=>'NGN','balance_minor'=>0,'created_at'=>now(),'updated_at'=>now()]);
   return $id;
  });
  return response()->json(['user'=>DB::table('users')->where('id',$created)->first(['id','name','email','role'])],201);
 }
 public function createCustomer(Request $r){return $this->register($r);}
 public function customer(Request $r,int $id){
  $uid=$r->attributes->get('training_user_id');
  if ($uid!==$id)return response()->json(['message'=>'Customer not found'],404);
  $user=DB::table('users')->where('id',$id)->first(['id','name','email','role']);
  return $user?response()->json(['data'=>$user]):response()->json(['message'=>'Customer not found'],404);
 }
 public function wallet(Request $r,string $id){
  $row=DB::table('wallets')->where('id',$id)->where('user_id',$r->attributes->get('training_user_id'))->first(['id','currency','balance_minor']);
  return $row?response()->json(['data'=>$row]):response()->json(['message'=>'Wallet not found'],404);
 }
 public function ledger(Request $r,string $id){
  $wallet=DB::table('wallets')->where('id',$id)->where('user_id',$r->attributes->get('training_user_id'))->first();
  if (!$wallet)return response()->json(['message'=>'Wallet not found'],404);
  $limit=min(100,max(1,(int)$r->query('limit',20)));
  return response()->json(['data'=>DB::table('ledger_entries')->where('wallet_id',$id)->orderByDesc('id')->limit($limit)->get()]);
 }
 public function transfer(Request $r){
  $data=$r->validate(['source_wallet_id'=>'required|uuid','destination_wallet_id'=>'required|uuid|different:source_wallet_id','amount_minor'=>'required|integer|min:1']);
  $key=$r->header('Idempotency-Key');
