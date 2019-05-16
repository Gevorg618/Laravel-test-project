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
            ['id' => 1, 'name' => 'admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('adminadminadmin')],
            ['id' => 2, 'name' => 'user',  'email' => 'user@gmail.com', 'password' => bcrypt('useruseruser')],
            ['id' => 3, 'name' => 'user1',  'email' => 'user1@gmail.com', 'password' => bcrypt('useruseruser1')],
            ['id' => 4, 'name' => 'user2',  'email' => 'user2@gmail.com', 'password' => bcrypt('useruseruser2')],
            ['id' => 5, 'name' => 'user3',  'email' => 'user3@gmail.com', 'password' => bcrypt('useruseruser3')],
            ['id' => 6, 'name' => 'user4',  'email' => 'user4@gmail.com', 'password' => bcrypt('useruseruser4')],
            ['id' => 7, 'name' => 'user4',  'email' => 'user5@gmail.com', 'password' => bcrypt('useruseruser5')],
        ];

        User::insert($users);
    }
}
