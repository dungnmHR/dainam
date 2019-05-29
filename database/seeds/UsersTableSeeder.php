<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'name' => 'Nguyễn Minh Dũng',
            'email' => 'doandat0107@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('12345678'),
        ]);

    }
}
