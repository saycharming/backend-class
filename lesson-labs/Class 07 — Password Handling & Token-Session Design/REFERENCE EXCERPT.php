use Illuminate\Support\Str;
class PayTrackAuthController {
 private function issue(int $userId):array {
  $access=Str::random(64);$refresh=Str::random(64);
  DB::table('api_tokens')->insert(['user_id'=>$userId,'token_hash'=>hash('sha256',$access),'expires_at'=>now()->addMinutes(15),'created_at'=>now()]);
  DB::table('refresh_tokens')->insert(['user_id'=>$userId,'token_hash'=>hash('sha256',$refresh),'expires_at'=>now()->addDays(7),'created_at'=>now(),'updated_at'=>now()]);
  return ['access_token'=>$access,'expires_in'=>900,'refresh_token'=>$refresh];
 }
 public function login(Request $r){
  $data=$r->validate(['email'=>'required|email','password'=>'required|string']);
  $user=DB::table('users')->where('email',strtolower($data['email']))->first();
  if (!$user||!Hash::check($data['password'],$user->password))return response()->json(['message'=>'Invalid credentials'],401);
  return response()->json($this->issue((int)$user->id));
 }
 public function refresh(Request $r){
  $data=$r->validate(['refresh_token'=>'required|string']);
  try{$fresh=DB::transaction(function()use($data){
   $row=DB::table('refresh_tokens')->where('token_hash',hash('sha256',$data['refresh_token']))->lockForUpdate()->first();
   if (!$row||$row->revoked_at||\Carbon\Carbon::parse($row->expires_at)->isPast())return null;
   DB::table('refresh_tokens')->where('id',$row->id)->update(['revoked_at'=>now(),'updated_at'=>now()]);
   return $this->issue((int)$row->user_id);
  },3);
  return $fresh?response()->json($fresh):response()->json(['message'=>'Invalid refresh token'],401);
  }catch(\Throwable $e){report($e);return response()->json(['message'=>'Refresh not available'],503);}
 }
}
