<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            'debtor' => '1',
            'receiver' => '2',
            'value' => '0'
        ]);
    }
}
