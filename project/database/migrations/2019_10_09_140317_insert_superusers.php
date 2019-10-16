<?php

use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

/**
 * Class InsertSuperuser adds admin user to the system.
 */
class InsertSuperusers extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      $email = 'admin@example.com';
      $user = User::create([
         'id' => Uuid::uuid5(Uuid::NAMESPACE_DNS, $email),
         'name' => 'admin',
         'email' => $email,
         'password' => Hash::make('admin'),
      ]);
      $user->api_token = Str::random(60);

      $email = 'test@example.com';
      $user = User::create([
         'id' => Uuid::uuid5(Uuid::NAMESPACE_DNS, $email),
         'name' => 'test',
         'email' => $email,
         'password' => Hash::make('test'),
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
