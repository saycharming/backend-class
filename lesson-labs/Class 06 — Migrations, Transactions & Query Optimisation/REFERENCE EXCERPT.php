use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void {
  Schema::create('wallets',function(Blueprint $t){$t->uuid('id')->primary();$t->foreignId('user_id')->constrained('users');$t->string('currency',3)->default('NGN');$t->unsignedBigInteger('balance_minor')->default(0);$t->timestamps();});
  Schema::create('ledger_entries',function(Blueprint $t){$t->id();$t->uuid('wallet_id');$t->string('direction',6);$t->unsignedBigInteger('amount_minor');$t->string('reference')->index();$t->timestamps();$t->foreign('wallet_id')->references('id')->on('wallets');});
  Schema::create('transfer_requests',function(Blueprint $t){$t->id();$t->foreignId('user_id')->constrained('users');$t->string('request_key')->unique();$t->string('payload_hash',64);$t->text('response_json');$t->timestamps();});
 }
 public function down():void {Schema::dropIfExists('transfer_requests');Schema::dropIfExists('ledger_entries');Schema::dropIfExists('wallets');}
};
