<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('brands')->delete();

        \DB::table('brands')->insert(array (
            0 =>
            array (
                'id' => 1,
                'brand_name' => 'Glessom Cosmed',
                'image' => 'glessom-cosmed-2021-01-24.jpg',
                'frontend' => 1,
                'created_at' => '2020-06-12 15:44:55',
                'updated_at' => '2021-01-24 08:19:40',
            ),
            1 =>
            array (
                'id' => 2,
                'brand_name' => 'Vico',
                'image' => 'vico-2020-06-13.jpg',
                'frontend' => 0,
                'created_at' => '2020-06-13 16:11:44',
                'updated_at' => '2021-01-24 08:09:49',
            ),
            2 =>
            array (
                'id' => 3,
                'brand_name' => 'Elegant',
                'image' => 'elegant-2021-01-24.jpg',
                'frontend' => 1,
                'created_at' => '2020-06-17 02:19:26',
                'updated_at' => '2021-01-24 08:16:39',
            ),
            3 =>
            array (
                'id' => 4,
                'brand_name' => 'Chinies',
                'image' => 'chinies-2021-01-24.jpg',
                'frontend' => 1,
                'created_at' => '2020-06-17 02:24:13',
                'updated_at' => '2021-01-24 08:22:51',
            ),
            4 =>
            array (
                'id' => 5,
                'brand_name' => 'new brand',
                'image' => NULL,
                'frontend' => 0,
                'created_at' => '2020-06-27 08:04:52',
                'updated_at' => '2021-01-24 08:10:55',
            ),
            5 =>
            array (
                'id' => 6,
                'brand_name' => 'Medicom',
                'image' => NULL,
                'frontend' => 0,
                'created_at' => '2020-07-03 11:31:01',
                'updated_at' => '2021-01-24 08:10:04',
            ),
            6 =>
            array (
                'id' => 7,
                'brand_name' => 'Jziki',
                'image' => 'jziki-2021-01-24.jpg',
                'frontend' => 1,
                'created_at' => '2020-07-03 14:38:34',
                'updated_at' => '2021-01-24 08:27:48',
            ),
            7 =>
            array (
                'id' => 8,
                'brand_name' => 'Vision Cosmetics',
                'image' => NULL,
                'frontend' => 0,
                'created_at' => '2020-07-04 03:17:02',
                'updated_at' => '2021-01-24 08:10:09',
            ),
            8 =>
            array (
                'id' => 9,
                'brand_name' => 'KN-95',
                'image' => NULL,
                'frontend' => 0,
                'created_at' => '2020-07-06 12:27:01',
                'updated_at' => '2021-01-24 08:09:18',
            ),
            9 =>
            array (
                'id' => 10,
                'brand_name' => 'McCons',
                'image' => 'mccons-2021-01-24.jpg',
                'frontend' => 1,
                'created_at' => '2020-07-06 12:29:41',
                'updated_at' => '2021-01-24 08:25:54',
            ),
            10 =>
            array (
                'id' => 11,
                'brand_name' => 'Ancalima',
                'image' => 'ancalima-2021-01-24.jpg',
                'frontend' => 1,
                'created_at' => '2020-07-06 12:35:15',
                'updated_at' => '2021-01-24 08:11:32',
            ),
            11 =>
            array (
                'id' => 12,
                'brand_name' => 'Yonker',
                'image' => NULL,
                'frontend' => 1,
                'created_at' => '2020-07-23 11:27:36',
                'updated_at' => '2020-07-23 11:27:36',
            ),
            12 =>
            array (
                'id' => 13,
                'brand_name' => 'Medicine',
                'image' => NULL,
                'frontend' => 0,
                'created_at' => '2020-09-08 20:38:50',
                'updated_at' => '2021-01-24 08:09:00',
            ),
            13 =>
            array (
                'id' => 14,
                'brand_name' => 'Selpium',
                'image' => NULL,
                'frontend' => 0,
                'created_at' => '2020-09-24 17:19:20',
                'updated_at' => '2021-01-24 08:08:54',
            ),
            14 =>
            array (
                'id' => 15,
                'brand_name' => 'JS',
                'image' => NULL,
                'frontend' => 0,
                'created_at' => '2020-11-26 23:44:21',
                'updated_at' => '2021-01-24 08:08:46',
            ),
            15 =>
            array (
                'id' => 16,
                'brand_name' => 'Saierji ji',
                'image' => NULL,
                'frontend' => 1,
                'created_at' => '2020-12-08 15:30:18',
                'updated_at' => '2020-12-08 15:30:18',
            ),
            16 =>
            array (
                'id' => 17,
                'brand_name' => 'Lovers',
                'image' => NULL,
                'frontend' => 0,
                'created_at' => '2020-12-31 15:22:26',
                'updated_at' => '2021-01-24 08:08:35',
            ),
            17 =>
            array (
                'id' => 18,
                'brand_name' => 'Aromix',
                'image' => NULL,
                'frontend' => 0,
                'created_at' => '2021-01-03 17:34:35',
                'updated_at' => '2021-01-24 08:08:31',
            ),
            18 =>
            array (
                'id' => 19,
                'brand_name' => 'ovative',
                'image' => NULL,
                'frontend' => 1,
                'created_at' => '2021-04-11 19:37:06',
                'updated_at' => '2021-04-11 19:38:11',
            ),
            19 =>
            array (
                'id' => 20,
                'brand_name' => 'gloit',
                'image' => NULL,
                'frontend' => 0,
                'created_at' => '2021-06-20 18:53:50',
                'updated_at' => '2021-06-20 18:53:50',
            ),
            20 =>
            array (
                'id' => 21,
                'brand_name' => 'biovencer',
                'image' => NULL,
                'frontend' => 0,
                'created_at' => '2021-08-15 00:11:28',
                'updated_at' => '2021-08-15 00:11:28',
            ),
        ));


    }
}
