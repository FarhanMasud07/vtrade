<?php

use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('sizes')->delete();

        \DB::table('sizes')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => '100 ml',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-06-12 16:01:36',
                'updated_at' => '2020-06-12 16:01:36',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => '200 ml',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-06-12 16:10:50',
                'updated_at' => '2020-06-12 16:10:50',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => '15 gm',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-06-13 15:48:31',
                'updated_at' => '2020-06-13 15:48:31',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => '75 gm',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-06-13 16:01:35',
                'updated_at' => '2020-06-13 16:01:35',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => '250 ml',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-06-13 16:08:03',
                'updated_at' => '2020-06-13 16:08:03',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => '14 gm',
                'type' => 'pos',
                'deleted_at' => NULL,
                'created_at' => '2020-06-16 18:11:00',
                'updated_at' => '2020-06-16 18:11:00',
            ),
            6 =>
            array (
                'id' => 8,
                'name' => '50 gm',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-06-17 02:25:43',
                'updated_at' => '2020-06-17 02:25:43',
            ),
            7 =>
            array (
                'id' => 9,
                'name' => '30 gm',
                'type' => 'pos',
                'deleted_at' => NULL,
                'created_at' => '2020-06-27 04:42:58',
                'updated_at' => '2020-06-27 04:42:58',
            ),
            8 =>
            array (
                'id' => 10,
                'name' => '500 ml',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-06-27 04:43:58',
                'updated_at' => '2020-06-27 04:43:58',
            ),
            9 =>
            array (
                'id' => 11,
                'name' => '25 gm',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-07-03 11:29:56',
                'updated_at' => '2020-11-27 00:27:56',
            ),
            10 =>
            array (
                'id' => 12,
                'name' => 'not defined',
                'type' => 'pos',
                'deleted_at' => NULL,
                'created_at' => '2020-07-04 08:07:42',
                'updated_at' => '2020-07-04 08:27:58',
            ),
            11 =>
            array (
                'id' => 13,
                'name' => '50 ml',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-07-17 09:54:12',
                'updated_at' => '2020-07-17 09:54:12',
            ),
            12 =>
            array (
                'id' => 14,
                'name' => '75 gm',
                'type' => 'pos',
                'deleted_at' => NULL,
                'created_at' => '2020-08-13 19:12:30',
                'updated_at' => '2020-08-13 19:12:30',
            ),
            13 =>
            array (
                'id' => 16,
                'name' => '180 ml',
                'type' => 'pos',
                'deleted_at' => NULL,
                'created_at' => '2020-08-13 20:24:40',
                'updated_at' => '2020-08-13 20:24:40',
            ),
            14 =>
            array (
                'id' => 17,
                'name' => '60 ml',
                'type' => 'pos',
                'deleted_at' => NULL,
                'created_at' => '2020-08-17 17:03:58',
                'updated_at' => '2020-08-17 17:03:58',
            ),
            15 =>
            array (
                'id' => 18,
                'name' => '100 gm',
                'type' => 'pos',
                'deleted_at' => NULL,
                'created_at' => '2020-08-17 17:07:49',
                'updated_at' => '2020-08-17 17:07:49',
            ),
            16 =>
            array (
                'id' => 19,
                'name' => '25 gm',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-08-19 15:08:43',
                'updated_at' => '2020-08-19 15:08:43',
            ),
            17 =>
            array (
                'id' => 20,
                'name' => '90 ml',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-08-19 19:01:51',
                'updated_at' => '2020-08-19 19:01:51',
            ),
            18 =>
            array (
                'id' => 21,
                'name' => '120 ml',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-10-05 16:34:33',
                'updated_at' => '2020-10-05 16:34:33',
            ),
            19 =>
            array (
                'id' => 22,
                'name' => '6 gm',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-10-08 13:54:37',
                'updated_at' => '2020-10-08 13:54:37',
            ),
            20 =>
            array (
                'id' => 23,
                'name' => '200 gm',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-10-15 12:09:54',
                'updated_at' => '2020-10-15 12:11:51',
            ),
            21 =>
            array (
                'id' => 24,
                'name' => '60 gm',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-10-21 16:12:23',
                'updated_at' => '2020-10-21 16:12:23',
            ),
            22 =>
            array (
                'id' => 25,
                'name' => '9 gm',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-11-01 18:05:07',
                'updated_at' => '2020-11-01 18:05:07',
            ),
            23 =>
            array (
                'id' => 26,
                'name' => '150 ml',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-11-07 11:52:56',
                'updated_at' => '2020-11-07 11:52:56',
            ),
            24 =>
            array (
                'id' => 27,
                'name' => '20 gm',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-11-07 13:39:57',
                'updated_at' => '2020-11-07 13:39:57',
            ),
            25 =>
            array (
                'id' => 28,
                'name' => 'Small',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-11-29 07:47:08',
                'updated_at' => '2020-11-29 07:47:08',
            ),
            26 =>
            array (
                'id' => 29,
                'name' => '10 mg',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-12-13 18:37:09',
                'updated_at' => '2020-12-13 18:37:09',
            ),
            27 =>
            array (
                'id' => 30,
                'name' => '30 ml',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2020-12-21 16:50:43',
                'updated_at' => '2020-12-21 16:50:43',
            ),
            28 =>
            array (
                'id' => 31,
                'name' => '105 ml',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2021-01-03 17:36:49',
                'updated_at' => '2021-01-03 17:36:49',
            ),
            29 =>
            array (
                'id' => 32,
                'name' => '10 gm',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2021-02-03 14:48:09',
                'updated_at' => '2021-02-03 14:48:09',
            ),
            30 =>
            array (
                'id' => 33,
                'name' => '1000 gm',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2021-02-15 11:36:17',
                'updated_at' => '2021-02-15 11:36:17',
            ),
            31 =>
            array (
                'id' => 34,
                'name' => '50mg',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2021-09-26 16:06:09',
                'updated_at' => '2021-09-26 16:06:09',
            ),
            32 =>
            array (
                'id' => 35,
                'name' => '100gm',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2021-10-12 00:41:50',
                'updated_at' => '2021-10-12 00:41:50',
            ),
            33 =>
            array (
                'id' => 36,
                'name' => '30\'s',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2022-02-10 16:11:13',
                'updated_at' => '2022-02-10 16:11:13',
            ),
            34 =>
            array (
                'id' => 37,
                'name' => '20\'s',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2022-02-10 16:11:29',
                'updated_at' => '2022-02-10 16:11:29',
            ),
            35 =>
            array (
                'id' => 38,
                'name' => '40 pcs',
                'type' => 'ecom',
                'deleted_at' => NULL,
                'created_at' => '2022-03-18 13:31:28',
                'updated_at' => '2022-03-18 13:31:28',
            ),
        ));


    }
}
