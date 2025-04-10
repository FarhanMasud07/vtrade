<?php

use Illuminate\Database\Seeder;

class EmployeeTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('employee_types')->delete();

        \DB::table('employee_types')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Deliveryman',
                'created_at' => '2020-08-05 17:10:52',
                'updated_at' => '2020-08-05 19:29:41',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Accountant',
                'created_at' => '2020-08-05 19:11:45',
                'updated_at' => '2020-08-05 19:11:45',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'International Communicator, Software Developer, Online Marketing manager',
                'created_at' => '2020-08-16 23:50:18',
                'updated_at' => '2020-12-29 11:57:15',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Sales Officer',
                'created_at' => '2020-08-16 23:51:10',
                'updated_at' => '2020-09-30 13:04:11',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'ASM',
                'created_at' => '2021-01-28 11:16:46',
                'updated_at' => '2021-01-28 11:16:46',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'ASO',
                'created_at' => '2021-01-28 11:17:01',
                'updated_at' => '2021-01-28 11:17:01',
            ),
        ));


    }
}
