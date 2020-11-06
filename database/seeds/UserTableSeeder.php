<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Sastra Rianto',
            'email' => 'rsastra901@gmail.com',
            'password' => bcrypt('rahasia'),
            'role_id' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'Gugus P',
            'email' => 'gugusp@gmail.com',
            'password' => bcrypt('rahasia'),
            'role_id' => '2',
        ]);
        DB::table('users')->insert([
            'name' => 'Aisyah Aja',
            'email' => 'aisyah@gmail.com',
            'password' => bcrypt('rahasia'),
            'role_id' => '3',
        ]);
        DB::table('users')->insert([
            'name' => 'Sofyan',
            'email' => 'sofyan@gmail.com',
            'password' => bcrypt('rahasia'),
            'role_id' => '4',
        ]);
    }
}
