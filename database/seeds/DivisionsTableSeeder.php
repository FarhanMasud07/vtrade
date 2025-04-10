<?php

use Illuminate\Database\Seeder;

class DivisionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('divisions')->delete();

        \DB::table('divisions')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Chattagram',
                'created_at' => '2020-06-12 21:44:54',
                'updated_at' => '2020-06-12 21:44:54',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Rajshahi',
                'created_at' => '2020-06-12 21:44:54',
                'updated_at' => '2020-06-12 21:44:54',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Khulna',
                'created_at' => '2020-06-12 21:44:54',
                'updated_at' => '2020-06-12 21:44:54',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Barisal',
                'created_at' => '2020-06-12 21:44:54',
                'updated_at' => '2020-06-12 21:44:54',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Sylhet',
                'created_at' => '2020-06-12 21:44:54',
                'updated_at' => '2020-06-12 21:44:54',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Dhaka',
                'created_at' => '2020-06-12 21:44:54',
                'updated_at' => '2020-06-12 21:44:54',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Rangpur',
                'created_at' => '2020-06-12 21:44:54',
                'updated_at' => '2020-06-12 21:44:54',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Mymensingh',
                'created_at' => '2020-06-12 21:44:54',
                'updated_at' => '2020-06-12 21:44:54',
            ),
        ));


    }
}
