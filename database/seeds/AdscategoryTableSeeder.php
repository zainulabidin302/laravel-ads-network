<?php

use Illuminate\Database\Seeder;

class AdscategoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('adscategory')->delete();
        
        \DB::table('adscategory')->insert(array (
            0 => 
            array (
                'id' => 7,
                'title' => 'Serivces',
                'category_id' => 0,
                'created_at' => '2016-11-25 19:50:21',
                'updated_at' => '2016-11-25 14:50:21',
            ),
            1 => 
            array (
                'id' => 12,
                'title' => 'Cars',
                'category_id' => 0,
                'created_at' => '2016-11-24 14:32:51',
                'updated_at' => '2016-11-24 14:32:51',
            ),
        ));
        
        
    }
}
