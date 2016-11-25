<?php

use Illuminate\Database\Seeder;

class AdcommentTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('adcomment')->delete();
        
        \DB::table('adcomment')->insert(array (
            0 => 
            array (
                'id' => 10,
                'comment' => 'My Nice special comment',
                'created_at' => '2016-11-24 20:53:54',
                'updated_at' => '2016-11-24 15:53:54',
                'ad_id' => 4,
                'user_id' => 3,
            ),
            1 => 
            array (
                'id' => 13,
                'comment' => 'long commentlong commentlong commentlong commentlong commentlong commentlong commentlong commentlong commentlong commentlong commentlong commentlong commentlong commentlong commentlong commentlong commentlong commentlong commentlong commentlong commentlong commentlong commentlong commentlong commentlong comment',
                'created_at' => '2016-11-24 16:07:57',
                'updated_at' => '2016-11-24 16:07:57',
                'ad_id' => 4,
                'user_id' => 3,
            ),
            2 => 
            array (
                'id' => 14,
                'comment' => 'hello',
                'created_at' => '2016-11-25 12:09:41',
                'updated_at' => '2016-11-25 12:09:41',
                'ad_id' => 1,
                'user_id' => 3,
            ),
        ));
        
        
    }
}
