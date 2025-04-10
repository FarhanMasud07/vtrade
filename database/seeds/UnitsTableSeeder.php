<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('units')->delete();

        \DB::table('units')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Pcs',
                'created_at' => '2020-12-09 00:00:00',
                'updated_at' => '2020-12-09 00:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Box',
                'created_at' => '2020-12-09 00:00:00',
                'updated_at' => '2020-12-09 00:00:00',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Liter',
                'created_at' => '2020-12-09 00:00:00',
                'updated_at' => '2020-12-09 00:00:00',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Kg',
                'created_at' => '2020-12-09 00:00:00',
                'updated_at' => '2020-12-09 00:00:00',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Gram',
                'created_at' => '2020-12-09 00:00:00',
                'updated_at' => '2020-12-09 00:00:00',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'ML',
                'created_at' => '2020-12-09 00:00:00',
                'updated_at' => '2020-12-09 00:00:00',
            ),
        ));


    }
}
