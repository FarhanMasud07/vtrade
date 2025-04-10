<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('tags')->delete();

        \DB::table('tags')->insert(array (
            0 =>
            array (
                'id' => 1,
                'tag_name' => 'cosmetics',
                'created_at' => '2020-06-12 16:03:18',
                'updated_at' => '2020-06-12 16:03:18',
            ),
            1 =>
            array (
                'id' => 2,
                'tag_name' => 'facewash',
                'created_at' => '2020-06-12 16:03:24',
                'updated_at' => '2020-06-12 16:03:24',
            ),
            2 =>
            array (
                'id' => 3,
                'tag_name' => 'shampoo',
                'created_at' => '2020-06-12 16:15:35',
                'updated_at' => '2020-06-12 16:15:35',
            ),
            3 =>
            array (
                'id' => 4,
                'tag_name' => 'Soap',
                'created_at' => '2020-06-13 16:02:12',
                'updated_at' => '2020-06-13 16:02:12',
            ),
            4 =>
            array (
                'id' => 5,
                'tag_name' => 'oil',
                'created_at' => '2020-06-27 07:48:45',
                'updated_at' => '2020-07-04 03:46:15',
            ),
            5 =>
            array (
                'id' => 6,
                'tag_name' => 'hair',
                'created_at' => '2020-07-01 16:57:25',
                'updated_at' => '2020-07-04 03:46:29',
            ),
            6 =>
            array (
                'id' => 7,
                'tag_name' => 'lorem',
                'created_at' => '2020-07-01 16:57:53',
                'updated_at' => '2020-07-01 16:57:53',
            ),
            7 =>
            array (
                'id' => 8,
                'tag_name' => 'mask',
                'created_at' => '2020-07-03 11:31:08',
                'updated_at' => '2020-07-03 11:31:08',
            ),
            8 =>
            array (
                'id' => 9,
                'tag_name' => 'health',
                'created_at' => '2020-07-03 11:31:16',
                'updated_at' => '2020-07-03 11:31:16',
            ),
            9 =>
            array (
                'id' => 10,
                'tag_name' => 'foods',
                'created_at' => '2020-07-14 09:02:44',
                'updated_at' => '2020-07-14 09:02:44',
            ),
            10 =>
            array (
                'id' => 11,
                'tag_name' => 'grocery',
                'created_at' => '2020-07-14 11:11:50',
                'updated_at' => '2020-07-14 11:11:50',
            ),
            11 =>
            array (
                'id' => 12,
                'tag_name' => 'women',
                'created_at' => '2020-07-14 11:32:41',
                'updated_at' => '2020-07-14 11:32:41',
            ),
            12 =>
            array (
                'id' => 13,
                'tag_name' => 'medicine',
                'created_at' => '2020-08-25 18:07:54',
                'updated_at' => '2020-08-25 18:07:54',
            ),
            13 =>
            array (
                'id' => 14,
                'tag_name' => 'mehdi',
                'created_at' => '2020-10-05 11:16:24',
                'updated_at' => '2020-10-05 11:16:24',
            ),
            14 =>
            array (
                'id' => 15,
                'tag_name' => 'Toilet cleaner',
                'created_at' => '2020-11-26 23:52:23',
                'updated_at' => '2020-11-26 23:52:23',
            ),
            15 =>
            array (
                'id' => 16,
                'tag_name' => 'Men',
                'created_at' => '2020-12-31 15:21:05',
                'updated_at' => '2020-12-31 15:21:05',
            ),
            16 =>
            array (
                'id' => 17,
                'tag_name' => 'JS Hair Removal Cream',
                'created_at' => '2021-01-04 16:39:58',
                'updated_at' => '2021-01-04 16:39:58',
            ),
            17 =>
            array (
                'id' => 18,
                'tag_name' => 'facial scrub',
                'created_at' => '2021-01-04 16:46:43',
                'updated_at' => '2021-01-04 16:46:43',
            ),
            18 =>
            array (
                'id' => 19,
                'tag_name' => 'skincare',
                'created_at' => '2021-02-17 15:15:36',
                'updated_at' => '2021-02-17 15:15:36',
            ),
            19 =>
            array (
                'id' => 20,
                'tag_name' => 'powder',
                'created_at' => '2021-10-12 00:43:04',
                'updated_at' => '2021-10-12 00:43:04',
            ),
        ));


    }
}
