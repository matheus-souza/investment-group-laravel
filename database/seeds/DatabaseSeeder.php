<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'cpf' => '11122233444',
            'name' => 'Login',
            'phone' => '51999999999',
            'birth' => '1990-02-11',
            'gender' => 'M',
            'email' => 'login@login.com',
            'password' => env('PASSWORD_HASH') ? bcrypt('123456') : '123456',
        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
