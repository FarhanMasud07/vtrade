<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('categories')->delete();

        \DB::table('categories')->insert(array (
            0 =>
            array (
                'id' => 1,
                'category_name' => 'Cosmetics',
                'image' => 'cosmetics-2021-02-171613552129.jpg',
                'frontend' => 1,
                'created_at' => '2020-06-12 15:44:55',
                'updated_at' => '2021-02-17 14:55:29',
            ),
            1 =>
            array (
                'id' => 2,
                'category_name' => 'Healthcare Products',
                'image' => 'healthcare-products-2021-02-171613552541.jpg',
                'frontend' => 1,
                'created_at' => '2020-07-03 11:29:06',
                'updated_at' => '2021-02-17 15:02:21',
            ),
            2 =>
            array (
                'id' => 3,
                'category_name' => 'Health Equipment',
                'image' => 'health-equipment-2020-07-03.jpg',
                'frontend' => 1,
                'created_at' => '2020-07-03 14:14:09',
                'updated_at' => '2020-07-03 14:14:09',
            ),
            3 =>
            array (
                'id' => 4,
                'category_name' => 'Household Product',
                'image' => 'household-product-2021-02-171613552719.jpg',
                'frontend' => 1,
                'created_at' => '2020-07-14 06:25:57',
                'updated_at' => '2021-02-17 15:05:19',
            ),
            4 =>
            array (
                'id' => 5,
                'category_name' => 'Foods And Beverages',
                'image' => 'foods-and-beverages-2020-07-14.jpg',
                'frontend' => 0,
                'created_at' => '2020-07-14 06:30:29',
                'updated_at' => '2021-01-26 17:31:41',
            ),
            5 =>
            array (
                'id' => 6,
                'category_name' => 'Office & Schooling',
                'image' => 'office-schooling-2020-07-14.jpg',
                'frontend' => 0,
                'created_at' => '2020-07-14 06:39:16',
                'updated_at' => '2021-01-26 17:31:47',
            ),
            6 =>
            array (
                'id' => 7,
                'category_name' => 'Skincare',
                'image' => 'skin-care-2021-02-171613552205.jpg',
                'frontend' => 1,
                'created_at' => '2020-11-27 00:24:42',
                'updated_at' => '2021-02-17 15:06:14',
            ),
            7 =>
            array (
                'id' => 8,
                'category_name' => 'Personal Care Products',
                'image' => 'personal-care-products-2021-02-171613552346.jpg',
                'frontend' => 1,
                'created_at' => '2020-11-27 00:26:56',
                'updated_at' => '2021-02-17 14:59:06',
            ),
            8 =>
            array (
                'id' => 9,
                'category_name' => 'Clothings',
                'image' => 'clothings-2020-11-29.jpg',
                'frontend' => 1,
                'created_at' => '2020-11-29 07:44:46',
                'updated_at' => '2020-11-29 07:44:46',
            ),
        ));


    }
}
