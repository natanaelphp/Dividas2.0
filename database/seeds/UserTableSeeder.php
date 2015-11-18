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
        DB::table('users')->insert([
            'name' => 'Natanael Colacino',
            'email' => 'natanael.php@gmail.com',
            'password' => bcrypt('teste'),
            'image' => 'Natanael.jpg',
        ]);

        DB::table('users')->insert([
            'name' => 'Marielen Nascimento',
            'email' => 'marielennasc@gmail.com',
            'password' => bcrypt('teste'),
            'image' => 'Marielen.jpg',
        ]);
    }
}
