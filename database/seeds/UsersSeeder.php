<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'username' => 'admin',
        	'password' => bcrypt('xuannam123'),
        	'fullname' => 'Pham Xuan Nam',
        	'email' => 'xnam7799@gmail.com',
        	'gender' => 1,
        	'date_of_birth' => '1997/10/04',
        	'address' => '08 Hà Văn Tính, Đà Nẵng',
        	'phone' => '0906498644',
        	'avatar' => 'avatar.jpg',
            'role_id' => '1',
        	'status' => '1',
        	'remember_token' => '',
        ]);
    }
}
