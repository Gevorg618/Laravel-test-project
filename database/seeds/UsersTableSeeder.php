<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        DB::table('users')->delete();

        $users = [
            [
                'id' => 1, 'name' => 'admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('adminadminadmin')],
            ];

        User::insert($users);
    }
}
