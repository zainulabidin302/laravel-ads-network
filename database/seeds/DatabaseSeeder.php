<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('AdcommentTableSeeder');
        $this->call('AdgalleryTableSeeder');
        $this->call('AdsTableSeeder');
        $this->call('AdsaleTableSeeder');
        $this->call('AdscategoryTableSeeder');
        $this->call('AdsviewTableSeeder');
        $this->call('AdtagTableSeeder');
        $this->call('PasswordResetsTableSeeder');
        $this->call('UsersTableSeeder');
    }
}
