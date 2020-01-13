<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            
            ['name' => 'inaba',
            'email' => 'inaba@gmail.com',
            'password' => bcrypt('11111111')
            ],

            ['name' => 'tanaka',
            'email' => 'tanaka@gmail.com',
            'password' => bcrypt('11111111')
            ],
            
        ]);
    }
}
