<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Zain',
                'email' => 'zain302@hotmail.com',
                'user_type' => -1,
                'password' => '$2y$10$OLJiS/s0zXuGldXjIH40TezcbnjgVPrKFp19kgmp6Dm9KYKvT/vKy',
                'remember_token' => 'LiWzbd3mLPXd1JEkGiCY9RA3pwCP52G3XTI7qUAPxgMM3g8NVz16CTIPfDMt',
                'created_at' => '2016-11-20 07:25:30',
                'updated_at' => '2016-11-25 12:09:13',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'ali',
                'email' => 'ali@ali.com',
                'user_type' => 1,
                'password' => '$2y$10$J6GeNwQy71PCSCB52wPHfePeBmh/elITecJhJ/q/wLT0Krj.VyBIS',
                'remember_token' => 'lZtuT5TpzpbIcvfC5eh9dAOtXY6xAp46FuzYHIXKvhCL7CTlBvuByl2JpM6F',
                'created_at' => '2016-11-25 11:05:35',
                'updated_at' => '2016-11-24 15:12:38',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'khan',
                'email' => 'khan@khan.com',
                'user_type' => 2,
                'password' => '$2y$10$KQo.VQg64.Kadr83LTQh7eVq3jo3nNPvmUC3t3.Ds6zA2iebQG5Q.',
                'remember_token' => 'gKczDJCS8GTBE23fT0Lv2IPfML9C9ZdgW8mUAlDRE76y4HHEgqiJv3fdGzt4',
                'created_at' => '2016-11-20 11:06:05',
                'updated_at' => '2016-11-25 13:51:00',
            ),
        ));
        
        
    }
}
