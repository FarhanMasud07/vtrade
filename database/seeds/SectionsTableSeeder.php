<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('sections')->delete();

        \DB::table('sections')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Wholesale',
                'module' => 'inventory',
                'created_at' => '2020-09-28 00:00:00',
                'updated_at' => '2020-09-28 00:00:00',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Cosmetics',
                'module' => 'inventory',
                'created_at' => '2020-09-28 00:00:00',
                'updated_at' => '2020-09-28 00:00:00',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Self',
                'module' => 'ecommerce',
                'created_at' => '2020-10-31 06:42:00',
                'updated_at' => '2020-10-31 06:42:00',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Custom',
                'module' => 'ecommerce',
                'created_at' => '2020-10-31 06:42:00',
                'updated_at' => '2020-10-31 06:42:00',
            ),
        ));


    }
}
