<?php

use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;

/**
 * Class InsertSuperuser adds admin user to the system.
 */
class InsertSuperuser extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      $user = User::create([
         'name' => 'admin',
         'email' => 'admin@example.com',
         'password' => Hash::make('admin'),
      ]);
      $user->api_token = Str::random(60);
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
