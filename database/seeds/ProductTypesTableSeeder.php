<?php

use Illuminate\Database\Seeder;

class ProductTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('product_types')->delete();

        \DB::table('product_types')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Handwash',
                'image' => 'handwash-2020-07-13.jpg',
                'frontend' => 1,
                'created_at' => '2020-06-12 03:44:55',
                'updated_at' => '2020-07-13 02:37:26',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Soap',
                'image' => 'soap-2020-07-13.jpg',
                'frontend' => 1,
                'created_at' => '2020-06-12 03:44:55',
                'updated_at' => '2020-07-13 02:52:06',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'cream',
                'image' => 'cream-2020-07-13.jpg',
                'frontend' => 1,
                'created_at' => '2020-06-12 03:44:55',
                'updated_at' => '2020-07-13 02:53:33',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Body Lotion',
                'image' => 'body-lotion-2020-07-13.jpg',
                'frontend' => 1,
                'created_at' => '2020-06-12 03:44:55',
                'updated_at' => '2020-07-13 02:55:26',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Dishwash',
                'image' => 'dishwash-2020-07-13.jpg',
                'frontend' => 1,
                'created_at' => '2020-06-12 03:44:55',
                'updated_at' => '2020-07-13 04:14:35',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Shampoo',
                'image' => 'shampoo-2020-07-13.jpg',
                'frontend' => 1,
                'created_at' => '2020-06-12 03:44:55',
                'updated_at' => '2020-07-13 02:57:29',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Facewash',
                'image' => 'facewash-2020-07-13.jpg',
                'frontend' => 1,
                'created_at' => '2020-06-12 03:55:28',
                'updated_at' => '2020-07-13 04:10:54',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Mustard Oil',
                'image' => 'mustard-oil-2020-07-13.jpg',
                'frontend' => 1,
                'created_at' => '2020-06-26 17:44:47',
                'updated_at' => '2020-07-13 04:22:02',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Mask',
                'image' => 'mask-2020-07-13.jpg',
                'frontend' => 1,
                'created_at' => '2020-07-02 23:31:39',
                'updated_at' => '2020-07-13 04:02:09',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'health Equipment',
                'image' => 'health-equipment-2020-07-13.jpg',
                'frontend' => 1,
                'created_at' => '2020-07-03 02:39:17',
                'updated_at' => '2020-07-13 04:04:36',
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'Hair Oil',
                'image' => 'hair-oil-2020-07-13.jpg',
                'frontend' => 1,
                'created_at' => '2020-07-03 15:15:47',
                'updated_at' => '2020-07-13 04:07:20',
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'Cap',
                'image' => 'cap-2020-07-13.jpg',
                'frontend' => 1,
                'created_at' => '2020-07-13 05:01:35',
                'updated_at' => '2020-07-13 05:01:35',
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'Medicated Solution',
                'image' => 'medicated-solution-2020-07-17.jpg',
                'frontend' => 1,
                'created_at' => '2020-07-16 21:58:11',
                'updated_at' => '2020-07-16 21:58:11',
            ),
            13 =>
            array (
                'id' => 14,
                'name' => 'Vaginal Wash',
                'image' => 'vaginal-wash-2020-10-04.jpg',
                'frontend' => 1,
                'created_at' => '2020-10-04 02:04:29',
                'updated_at' => '2020-10-04 02:04:29',
            ),
            14 =>
            array (
                'id' => 15,
                'name' => 'Hair Color',
                'image' => 'hair-color-2020-10-05.jpg',
                'frontend' => 1,
                'created_at' => '2020-10-04 22:53:31',
                'updated_at' => '2020-10-04 22:53:31',
            ),
            15 =>
            array (
                'id' => 16,
                'name' => 'Mehdi',
                'image' => 'mehdi-2020-10-05.jpg',
                'frontend' => 1,
                'created_at' => '2020-10-04 23:16:55',
                'updated_at' => '2020-10-04 23:16:55',
            ),
            16 =>
            array (
                'id' => 17,
                'name' => 'Sunscreen Lotion',
                'image' => 'sunscreen-lotion-2020-10-05.jpg',
                'frontend' => 1,
                'created_at' => '2020-10-04 23:31:05',
                'updated_at' => '2020-10-04 23:31:05',
            ),
            17 =>
            array (
                'id' => 18,
                'name' => 'Hand Sanitizer',
                'image' => 'hand-sanitizer-2020-10-05.jpg',
                'frontend' => 1,
                'created_at' => '2020-10-04 23:47:04',
                'updated_at' => '2020-10-04 23:47:04',
            ),
            18 =>
            array (
                'id' => 19,
                'name' => 'Skin Lightening Cream',
                'image' => 'skin-lightening-cream-2020-10-05.jpg',
                'frontend' => 1,
                'created_at' => '2020-10-04 23:59:12',
                'updated_at' => '2020-10-04 23:59:12',
            ),
            19 =>
            array (
                'id' => 20,
                'name' => 'Glycerine',
                'image' => 'glycerine-2020-11-27.jpg',
                'frontend' => 1,
                'created_at' => '2020-10-05 04:37:25',
                'updated_at' => '2020-11-26 22:59:11',
            ),
            20 =>
            array (
                'id' => 21,
                'name' => 'Vasline',
                'image' => 'vasline-2020-10-08.jpg',
                'frontend' => 1,
                'created_at' => '2020-10-08 01:58:27',
                'updated_at' => '2020-10-08 01:58:27',
            ),
            21 =>
            array (
                'id' => 22,
                'name' => 'Facial',
                'image' => 'facial-2020-10-24.jpg',
                'frontend' => 1,
                'created_at' => '2020-10-24 05:56:47',
                'updated_at' => '2020-10-24 05:56:47',
            ),
            22 =>
            array (
                'id' => 23,
                'name' => 'Medicine',
                'image' => 'medicine-2020-11-09.jpg',
                'frontend' => 1,
                'created_at' => '2020-11-09 08:01:03',
                'updated_at' => '2020-11-09 08:01:03',
            ),
            23 =>
            array (
                'id' => 24,
                'name' => 'Dish Wash liquid',
                'image' => 'dish-wash-liquid-2020-11-27.jpg',
                'frontend' => 1,
                'created_at' => '2020-11-26 12:03:01',
                'updated_at' => '2020-11-26 22:56:48',
            ),
            24 =>
            array (
                'id' => 25,
                'name' => 'house hold',
                'image' => 'house-hold-2020-11-27.jpg',
                'frontend' => 1,
                'created_at' => '2020-11-26 12:05:09',
                'updated_at' => '2020-11-26 23:00:31',
            ),
            25 =>
            array (
                'id' => 26,
                'name' => 'Kids Clothings',
                'image' => 'kids-clothings-2020-11-29.jpg',
                'frontend' => 1,
                'created_at' => '2020-11-28 19:50:19',
                'updated_at' => '2020-11-28 19:50:19',
            ),
            26 =>
            array (
                'id' => 27,
                'name' => 'Serum',
                'image' => 'serum-2020-12-21.jpg',
                'frontend' => 1,
                'created_at' => '2020-12-21 04:55:35',
                'updated_at' => '2020-12-21 04:55:35',
            ),
            27 =>
            array (
                'id' => 28,
                'name' => 'Perfume',
                'image' => 'perfume-2020-12-31.jpeg',
                'frontend' => 1,
                'created_at' => '2020-12-31 03:20:24',
                'updated_at' => '2020-12-31 03:37:28',
            ),
            28 =>
            array (
                'id' => 29,
                'name' => 'Lotion',
                'image' => 'lotion-2021-01-18.jpg',
                'frontend' => 1,
                'created_at' => '2021-01-18 00:00:52',
                'updated_at' => '2021-01-18 00:00:52',
            ),
            29 =>
            array (
                'id' => 30,
                'name' => 'health supplement',
                'image' => 'health-supplement-2021-08-15.jpg',
                'frontend' => 0,
                'created_at' => '2021-08-14 12:13:14',
                'updated_at' => '2021-08-14 12:13:14',
            ),
            30 =>
            array (
                'id' => 35,
                'name' => 'powder',
                'image' => NULL,
                'frontend' => 0,
                'created_at' => '2021-10-12 00:42:40',
                'updated_at' => '2021-10-12 00:42:40',
            ),
            31 =>
            array (
                'id' => 36,
                'name' => 'Dusting powder',
                'image' => NULL,
                'frontend' => 0,
                'created_at' => '2021-11-09 16:22:18',
                'updated_at' => '2021-11-09 16:22:18',
            ),
            32 =>
            array (
                'id' => 37,
                'name' => 'food supplement',
                'image' => 'food-supplement-2022-03-18.jpg',
                'frontend' => 0,
                'created_at' => '2022-03-18 13:37:34',
                'updated_at' => '2022-03-18 13:37:34',
            ),
        ));


    }
}
