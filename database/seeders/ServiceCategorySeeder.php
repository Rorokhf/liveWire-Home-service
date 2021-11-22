<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('service_categories')->insert([

            [
                "name" => 'AC',
                'slug' => 'ac',
                'image' => '1521969345.png'
            ],
            [
                "name" => 'Beauty',
                'slug' => 'beauty',
                'image' => '1521969358.png'
            ],
            [
                "name" => 'plumbing',
                'slug' => 'plumbing',
                'image' => '1521969409.png'
            ],
            [
                "name" => 'Electrical',
                'slug' => 'electrical',
                'image' => '1521969419.png'
            ],
            [
                "name" => 'water',
                'slug' => 'water',
                'image' => '1521969430.png'
            ],
        ]);
    }
}
