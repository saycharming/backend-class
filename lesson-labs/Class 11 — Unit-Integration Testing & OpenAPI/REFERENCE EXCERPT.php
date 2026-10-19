class PayTrackTest extends TestCase {
 use RefreshDatabase;
 public function test_health():void{$this->getJson('/health/live')->assertOk()->assertJsonPath('status','alive');}
 public function test_customer_registers_and_has_wallet():void{
  $this->postJson('/v1/auth/register',['name'=>'Tola Ade','email'=>'tola@example.test','password'=>'veryGoodPass9'])->assertCreated();
  $this->assertDatabaseHas('wallets',['balance_minor'=>0]);
 }
 public function test_transfer_requires_authorisation():void{$this->postJson('/v1/transfers',[])->assertUnauthorized();}
}
