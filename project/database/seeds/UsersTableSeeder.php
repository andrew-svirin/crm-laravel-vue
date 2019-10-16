<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      for ($i = 1; $i < 11; $i++)
      {
         $name = 'seeder-' . $i;
         DB::table('users')->insert([
            'name' => $name,
            'email' => $name . '@example.com',
            'password' => Hash::make($name),
         ]);
      }

   }
}
