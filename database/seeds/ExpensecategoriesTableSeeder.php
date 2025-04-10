<?php

use Illuminate\Database\Seeder;

class ExpensecategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('expensecategories')->delete();

        \DB::table('expensecategories')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Factory',
                'created_at' => '2020-10-20 12:55:30',
                'updated_at' => '2020-10-20 16:45:53',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Office',
                'created_at' => '2020-10-20 12:55:39',
                'updated_at' => '2020-10-20 12:58:03',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Trade',
                'created_at' => '2020-10-20 16:27:30',
                'updated_at' => '2020-10-25 14:45:31',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Cosmetics',
                'created_at' => '2020-10-20 16:40:09',
                'updated_at' => '2020-10-21 12:43:28',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Employees Salary',
                'created_at' => '2020-10-21 11:03:11',
                'updated_at' => '2020-10-25 14:44:48',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Product Delivery',
                'created_at' => '2020-12-02 11:38:12',
                'updated_at' => '2020-12-02 11:38:12',
            ),
        ));


    }
}
