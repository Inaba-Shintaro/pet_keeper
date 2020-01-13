<?php

use Illuminate\Database\Seeder;

class PettypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pettypes')->insert([
            
            ['type_name' => '大型犬',],

            ['type_name' => '小型犬',],

            ['type_name' => '小鳥',],
            
        ]);
    }
}
