<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'alex',
            'email' => 'admin@app.com',
            'password' => Hash::make('123456'),
            'type'=>'superadmin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
