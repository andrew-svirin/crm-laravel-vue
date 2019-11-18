<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 11; $i++) {
            $name = 'seeder-' . $i;
            $email = $name . '@example.com';
            DB::table('users')->insert([
                'id' => Uuid::uuid5(Uuid::NAMESPACE_DNS, $email),
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($name),
            ]);
        }

    }
}
