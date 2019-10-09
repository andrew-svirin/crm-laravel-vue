<?php


use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;

/**
 * Class AddSuperuser adds admin user to the system.
 */
class AddSuperuser extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      $token = Str::random(60);
      $user = new User();
      $user->name = 'admin';
      $user->email = 'admin@example.com';
      $user->password = Hash::make('admin');
      $user->api_token = hash('sha256', $token);
      $user->save();
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    * @throws Exception
    */
   public function down()
   {
      $user = User::where('name', '=', 'admin');
      $user->delete();
   }
}
