<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Hugo Guillermo',
            'email' => 'hugorebel1998@gmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
