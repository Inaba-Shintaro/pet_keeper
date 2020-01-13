<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'user_id' => '1',
                'term_start' => Carbon::today(),
                'term_end' => Carbon::tomorrow(),
                'price' => '100',
                'completed' => '1',
            ],

            [
                'user_id' => '2',
                'term_start' => Carbon::today(),
                'term_end' => Carbon::tomorrow(),
                'price' => '500',
                'completed' => '1',
            ],

            [
                'user_id' => '1',
                'term_start' => Carbon::today(),
                'term_end' => Carbon::tomorrow(),
                'price' => '300',
                'completed' => '1',
            ],

            [
                'user_id' => '2',
                'term_start' => Carbon::today(),
                'term_end' => Carbon::tomorrow(),
                'price' => '1500',
                'completed' => '1',
            ],

            [
                'user_id' => '1',
                'term_start' => Carbon::today(),
                'term_end' => Carbon::tomorrow(),
                'price' => '100',
                'completed' => '1',
            ],

            [
                'user_id' => '1',
                'term_start' => Carbon::today(),
                'term_end' => Carbon::tomorrow(),
                'price' => '100',
                'completed' => '1',
            ],
            
            ]);

    }
}
