<?php

use Illuminate\Database\Seeder;

class BiouserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('biouser')->insert([
            'id_user' => '1',
            'nik' => '3271046504930002',
            'alamat' => 'Alasmalang, Singojuruh',
            'rekening' => '000123453679123',
            'notelepon' => '083122023132',
        ]);
        DB::table('biouser')->insert([
            'id_user' => '2',
            'nik' => '2222000034563345',
            'alamat' => 'Jln Riau, Jember',
            'rekening' => '121212343367222',
            'notelepon' => '082200981234',
        ]);
        DB::table('biouser')->insert([
            'id_user' => '3',
            'nik' => '3333110134495626',
            'alamat' => 'Jln Riau, Jember',
            'rekening' => '130011551240111',
            'notelepon' => '083100091055',
        ]);
    }
}
