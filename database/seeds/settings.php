<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class settings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'type'=>'about',
            'content'=>'',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
