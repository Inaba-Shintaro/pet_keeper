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
            
            ['name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('12345678'),
            'area' => '関西',
            'host_experience' => '1年未満',
            'comment' =>'ペット歴10年以上です。',
            ],

            ['name' => 'test2',
            'email' => 'test2@gmail.com',
            'password' => bcrypt('12345678'),
            'area' => '北海道',
            'host_experience' => '1年未満',
            'comment' =>'ペット歴はありません。',
            ],
            
        ]);
    }
}
