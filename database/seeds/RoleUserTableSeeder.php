<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_users')->truncate();

        DB::table('role_users')->insert(array(
            array(

                'user_id' => 1,
                'role_id' => 1,
            ),
            array(

                'user_id' => 2,
                'role_id' => 2,
            ),
            array(

                'user_id' => 3,
                'role_id' => 2,
            ),
            array(

                'user_id' => 4,
                'role_id' => 2,
            ),
            array(

                'user_id' => 5,
                'role_id' => 2,
            ),
            array(

                'user_id' => 6,
                'role_id' => 2,
            ),
            array(

                'user_id' => 7,
                'role_id' => 2,
            ),
        ));
    }
}
