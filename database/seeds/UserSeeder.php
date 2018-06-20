<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producto = User::Create([
            'name' => 'ehernandeza',
            'email' => 'eduardoha70gmail.com',
            'password'  => bcrypt('Hernandez1'),
        ]);
    }
}
