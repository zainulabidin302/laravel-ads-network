<?php

use Illuminate\Database\Seeder;

class AdsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('ads')->delete();
        
        \DB::table('ads')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Ferrari Required',
                'price' => 2000000,
                'description' => 'red Ferrari required
yellow Ferrari required
green Ferrari required
',
                'is_sold' => NULL,
                'seller_id' => NULL,
                'created_at' => '2016-11-24 14:24:10',
                'updated_at' => '2016-11-24 14:32:38',
                'category_id' => 7,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Johny Johny Yes papa',
                'price' => 4200000000,
                'description' => 'no description',
                'is_sold' => 1,
                'seller_id' => NULL,
                'created_at' => '2016-11-24 14:25:18',
                'updated_at' => '2016-11-24 15:12:14',
                'category_id' => 12,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'New Ad',
                'price' => 123,
                'description' => 'in old cateogry',
                'is_sold' => NULL,
                'seller_id' => NULL,
                'created_at' => '2016-11-24 14:44:51',
                'updated_at' => '2016-11-24 14:44:51',
                'category_id' => 12,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Cars more',
                'price' => 123123,
                'description' => 'asdfasd asd f',
                'is_sold' => NULL,
                'seller_id' => NULL,
                'created_at' => '2016-11-25 14:45:04',
                'updated_at' => '2016-11-24 14:45:04',
                'category_id' => 12,
            ),
            4 => 
            array (
                'id' => 7,
                'title' => 'Some nice ads',
                'price' => 2500,
                'description' => 'Some nice ads nothing',
                'is_sold' => NULL,
                'seller_id' => NULL,
                'created_at' => '2016-11-24 14:45:58',
                'updated_at' => '2016-11-24 14:45:58',
                'category_id' => 12,
            ),
            5 => 
            array (
                'id' => 8,
                'title' => 'This is some ads lets go',
                'price' => 5000,
                'description' => 'description',
                'is_sold' => NULL,
                'seller_id' => NULL,
                'created_at' => '2016-11-24 14:46:34',
                'updated_at' => '2016-11-24 14:46:34',
                'category_id' => 12,
            ),
            6 => 
            array (
                'id' => 9,
                'title' => 'Apple',
                'price' => 222222,
                'description' => 'apple is car',
                'is_sold' => NULL,
                'seller_id' => NULL,
                'created_at' => '2016-11-24 14:46:51',
                'updated_at' => '2016-11-24 14:46:51',
                'category_id' => 12,
            ),
        ));
        
        
    }
}
