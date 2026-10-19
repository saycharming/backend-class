<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
  if (!$key || strlen($key)>120)return response()->json(['message'=>'Idempotency-Key header required'],422);
  $userId=$r->attributes->get('training_user_id');
  $hash=hash('sha256',json_encode($data));
  $out=DB::transaction(function()use($key,$hash,$userId,$data){
   $existing=DB::table('transfer_requests')->where('request_key',$key)->lockForUpdate()->first();
   if($existing){
    if($existing->user_id!=$userId||$existing->payload_hash!==$hash)throw new \DomainException('Idempotency key was already used for a different request');
    return ['data'=>json_decode($existing->response_json,true),'replayed'=>true];
   }
   // Lock in deterministic ID order to reduce deadlock risk.
   $ids=[$data['source_wallet_id'],$data['destination_wallet_id']];sort($ids);
   $wallets=DB::table('wallets')->whereIn('id',$ids)->orderBy('id')->lockForUpdate()->get()->keyBy('id');
   $from=$wallets->get($data['source_wallet_id']);$to=$wallets->get($data['destination_wallet_id']);
   if(!$from||!$to||$from->user_id!=$userId)throw new \DomainException('Wallet not found or not permitted');
   if($from->currency!==$to->currency)throw new \DomainException('Currency mismatch');
   if($from->balance_minor<$data['amount_minor'])throw new \DomainException('Insufficient funds');
   DB::table('wallets')->where('id',$from->id)->decrement('balance_minor',$data['amount_minor']);
   DB::table('wallets')->where('id',$to->id)->increment('balance_minor',$data['amount_minor']);
   $ref=(string)Str::uuid();
   foreach([[$from->id,'debit'],[$to->id,'credit']] as [$walletId,$direction])DB::table('ledger_entries')->insert(['wallet_id'=>$walletId,'direction'=>$direction,'amount_minor'=>$data['amount_minor'],'reference'=>$ref,'created_at'=>now(),'updated_at'=>now()]);
   $result=['reference'=>$ref,'source_wallet_id'=>$from->id,'destination_wallet_id'=>$to->id,'amount_minor'=>$data['amount_minor']];
   DB::table('transfer_requests')->insert(['user_id'=>$userId,'request_key'=>$key,'payload_hash'=>$hash,'response_json'=>json_encode($result),'created_at'=>now(),'updated_at'=>now()]);
   return ['data'=>$result,'replayed'=>false];
  },3);
  return response()->json($out,$out['replayed']?200:201);
 }
 public function refunds(Request $r){
  $user=DB::table('users')->where('id',$r->attributes->get('training_user_id'))->first();
  if (!$user || $user->role!=='admin') return response()->json(['message'=>'Forbidden'],403);
  return response()->json(['error'=>['code'=>'not_implemented','message'=>'Refund execution is a classroom design exercise']],501);}
}
