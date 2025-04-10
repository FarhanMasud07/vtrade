<?php

use Illuminate\Database\Seeder;

class ProductTagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('product_tags')->delete();

        \DB::table('product_tags')->insert(array (
            0 =>
            array (
                'id' => 1,
                'product_id' => 1,
                'tags_id' => 1,
                'created_at' => '2020-06-12 16:04:11',
                'updated_at' => '2020-06-12 16:04:11',
            ),
            1 =>
            array (
                'id' => 2,
                'product_id' => 1,
                'tags_id' => 2,
                'created_at' => '2020-06-12 16:04:11',
                'updated_at' => '2020-06-12 16:04:11',
            ),
            2 =>
            array (
                'id' => 3,
                'product_id' => 2,
                'tags_id' => 1,
                'created_at' => '2020-06-12 16:15:01',
                'updated_at' => '2020-06-12 16:15:01',
            ),
            3 =>
            array (
                'id' => 4,
                'product_id' => 2,
                'tags_id' => 3,
                'created_at' => '2020-06-12 16:16:02',
                'updated_at' => '2020-06-12 16:16:02',
            ),
            4 =>
            array (
                'id' => 5,
                'product_id' => 3,
                'tags_id' => 1,
                'created_at' => '2020-06-13 15:48:12',
                'updated_at' => '2020-06-13 15:48:12',
            ),
            5 =>
            array (
                'id' => 6,
                'product_id' => 4,
                'tags_id' => 1,
                'created_at' => '2020-06-13 16:01:19',
                'updated_at' => '2020-06-13 16:01:19',
            ),
            6 =>
            array (
                'id' => 7,
                'product_id' => 4,
                'tags_id' => 4,
                'created_at' => '2020-06-13 16:03:09',
                'updated_at' => '2020-06-13 16:03:09',
            ),
            7 =>
            array (
                'id' => 8,
                'product_id' => 5,
                'tags_id' => 1,
                'created_at' => '2020-06-13 16:09:13',
                'updated_at' => '2020-06-13 16:09:13',
            ),
            8 =>
            array (
                'id' => 9,
                'product_id' => 6,
                'tags_id' => 1,
                'created_at' => '2020-06-17 02:17:55',
                'updated_at' => '2020-06-17 02:17:55',
            ),
            9 =>
            array (
                'id' => 10,
                'product_id' => 6,
                'tags_id' => 4,
                'created_at' => '2020-06-17 02:17:55',
                'updated_at' => '2020-06-17 02:17:55',
            ),
            10 =>
            array (
                'id' => 11,
                'product_id' => 7,
                'tags_id' => 1,
                'created_at' => '2020-06-17 02:22:13',
                'updated_at' => '2020-06-17 02:22:13',
            ),
            11 =>
            array (
                'id' => 12,
                'product_id' => 7,
                'tags_id' => 4,
                'created_at' => '2020-06-17 02:22:13',
                'updated_at' => '2020-06-17 02:22:13',
            ),
            12 =>
            array (
                'id' => 13,
                'product_id' => 8,
                'tags_id' => 1,
                'created_at' => '2020-06-17 02:28:49',
                'updated_at' => '2020-06-17 02:28:49',
            ),
            13 =>
            array (
                'id' => 14,
                'product_id' => 9,
                'tags_id' => 1,
                'created_at' => '2020-06-17 02:31:24',
                'updated_at' => '2020-06-17 02:31:24',
            ),
            14 =>
            array (
                'id' => 15,
                'product_id' => 10,
                'tags_id' => 1,
                'created_at' => '2020-06-17 02:33:56',
                'updated_at' => '2020-06-17 02:33:56',
            ),
            15 =>
            array (
                'id' => 16,
                'product_id' => 10,
                'tags_id' => 4,
                'created_at' => '2020-06-17 02:33:56',
                'updated_at' => '2020-06-17 02:33:56',
            ),
            16 =>
            array (
                'id' => 17,
                'product_id' => 11,
                'tags_id' => 1,
                'created_at' => '2020-06-17 02:37:59',
                'updated_at' => '2020-06-17 02:37:59',
            ),
            17 =>
            array (
                'id' => 18,
                'product_id' => 12,
                'tags_id' => 1,
                'created_at' => '2020-06-22 13:34:31',
                'updated_at' => '2020-06-22 13:34:31',
            ),
            18 =>
            array (
                'id' => 19,
                'product_id' => 13,
                'tags_id' => 1,
                'created_at' => '2020-06-27 08:12:10',
                'updated_at' => '2020-06-27 08:12:10',
            ),
            19 =>
            array (
                'id' => 20,
                'product_id' => 13,
                'tags_id' => 2,
                'created_at' => '2020-06-27 08:12:10',
                'updated_at' => '2020-06-27 08:12:10',
            ),
            20 =>
            array (
                'id' => 21,
                'product_id' => 13,
                'tags_id' => 3,
                'created_at' => '2020-06-27 08:12:10',
                'updated_at' => '2020-06-27 08:12:10',
            ),
            21 =>
            array (
                'id' => 22,
                'product_id' => 14,
                'tags_id' => 2,
                'created_at' => '2020-06-30 13:41:17',
                'updated_at' => '2020-06-30 13:41:17',
            ),
            22 =>
            array (
                'id' => 23,
                'product_id' => 14,
                'tags_id' => 4,
                'created_at' => '2020-06-30 13:41:17',
                'updated_at' => '2020-06-30 13:41:17',
            ),
            23 =>
            array (
                'id' => 24,
                'product_id' => 15,
                'tags_id' => 1,
                'created_at' => '2020-06-30 13:46:27',
                'updated_at' => '2020-06-30 13:46:27',
            ),
            24 =>
            array (
                'id' => 25,
                'product_id' => 15,
                'tags_id' => 2,
                'created_at' => '2020-06-30 13:46:27',
                'updated_at' => '2020-06-30 13:46:27',
            ),
            25 =>
            array (
                'id' => 26,
                'product_id' => 15,
                'tags_id' => 3,
                'created_at' => '2020-06-30 13:46:27',
                'updated_at' => '2020-06-30 13:46:27',
            ),
            26 =>
            array (
                'id' => 27,
                'product_id' => 16,
                'tags_id' => 1,
                'created_at' => '2020-06-30 13:55:30',
                'updated_at' => '2020-06-30 13:55:30',
            ),
            27 =>
            array (
                'id' => 28,
                'product_id' => 16,
                'tags_id' => 3,
                'created_at' => '2020-06-30 13:55:30',
                'updated_at' => '2020-06-30 13:55:30',
            ),
            28 =>
            array (
                'id' => 29,
                'product_id' => 16,
                'tags_id' => 4,
                'created_at' => '2020-06-30 13:55:30',
                'updated_at' => '2020-06-30 13:55:30',
            ),
            29 =>
            array (
                'id' => 30,
                'product_id' => 17,
                'tags_id' => 2,
                'created_at' => '2020-06-30 14:00:21',
                'updated_at' => '2020-06-30 14:00:21',
            ),
            30 =>
            array (
                'id' => 31,
                'product_id' => 17,
                'tags_id' => 3,
                'created_at' => '2020-06-30 14:00:21',
                'updated_at' => '2020-06-30 14:00:21',
            ),
            31 =>
            array (
                'id' => 32,
                'product_id' => 18,
                'tags_id' => 2,
                'created_at' => '2020-07-01 15:51:53',
                'updated_at' => '2020-07-01 15:51:53',
            ),
            32 =>
            array (
                'id' => 33,
                'product_id' => 19,
                'tags_id' => 2,
                'created_at' => '2020-07-01 15:55:37',
                'updated_at' => '2020-07-01 15:55:37',
            ),
            33 =>
            array (
                'id' => 34,
                'product_id' => 19,
                'tags_id' => 3,
                'created_at' => '2020-07-02 04:27:52',
                'updated_at' => '2020-07-02 04:27:52',
            ),
            34 =>
            array (
                'id' => 35,
                'product_id' => 19,
                'tags_id' => 4,
                'created_at' => '2020-07-02 04:27:52',
                'updated_at' => '2020-07-02 04:27:52',
            ),
            35 =>
            array (
                'id' => 36,
                'product_id' => 20,
                'tags_id' => 8,
                'created_at' => '2020-07-03 11:32:28',
                'updated_at' => '2020-07-03 11:32:28',
            ),
            36 =>
            array (
                'id' => 37,
                'product_id' => 20,
                'tags_id' => 9,
                'created_at' => '2020-07-03 11:32:28',
                'updated_at' => '2020-07-03 11:32:28',
            ),
            37 =>
            array (
                'id' => 38,
                'product_id' => 21,
                'tags_id' => 9,
                'created_at' => '2020-07-03 14:04:25',
                'updated_at' => '2020-07-03 14:04:25',
            ),
            38 =>
            array (
                'id' => 39,
                'product_id' => 22,
                'tags_id' => 9,
                'created_at' => '2020-07-03 14:38:08',
                'updated_at' => '2020-07-03 14:38:08',
            ),
            39 =>
            array (
                'id' => 40,
                'product_id' => 23,
                'tags_id' => 1,
                'created_at' => '2020-07-04 03:19:54',
                'updated_at' => '2020-07-04 03:19:54',
            ),
            40 =>
            array (
                'id' => 41,
                'product_id' => 24,
                'tags_id' => 1,
                'created_at' => '2020-07-04 03:51:03',
                'updated_at' => '2020-07-04 03:51:03',
            ),
            41 =>
            array (
                'id' => 42,
                'product_id' => 24,
                'tags_id' => 5,
                'created_at' => '2020-07-04 03:51:03',
                'updated_at' => '2020-07-04 03:51:03',
            ),
            42 =>
            array (
                'id' => 43,
                'product_id' => 24,
                'tags_id' => 6,
                'created_at' => '2020-07-04 03:51:03',
                'updated_at' => '2020-07-04 03:51:03',
            ),
            43 =>
            array (
                'id' => 44,
                'product_id' => 25,
                'tags_id' => 1,
                'created_at' => '2020-07-04 04:04:58',
                'updated_at' => '2020-07-04 04:04:58',
            ),
            44 =>
            array (
                'id' => 45,
                'product_id' => 25,
                'tags_id' => 5,
                'created_at' => '2020-07-04 04:04:58',
                'updated_at' => '2020-07-04 04:04:58',
            ),
            45 =>
            array (
                'id' => 46,
                'product_id' => 25,
                'tags_id' => 6,
                'created_at' => '2020-07-04 04:04:58',
                'updated_at' => '2020-07-04 04:04:58',
            ),
            46 =>
            array (
                'id' => 47,
                'product_id' => 82,
                'tags_id' => 8,
                'created_at' => '2020-07-06 12:31:37',
                'updated_at' => '2020-07-06 12:31:37',
            ),
            47 =>
            array (
                'id' => 48,
                'product_id' => 83,
                'tags_id' => 1,
                'created_at' => '2020-07-06 12:41:32',
                'updated_at' => '2020-07-06 12:41:32',
            ),
            48 =>
            array (
                'id' => 51,
                'product_id' => 32,
                'tags_id' => 1,
                'created_at' => '2020-07-06 13:46:05',
                'updated_at' => '2020-07-06 13:46:05',
            ),
            49 =>
            array (
                'id' => 52,
                'product_id' => 32,
                'tags_id' => 4,
                'created_at' => '2020-07-06 13:46:05',
                'updated_at' => '2020-07-06 13:46:05',
            ),
            50 =>
            array (
                'id' => 53,
                'product_id' => 83,
                'tags_id' => 1,
                'created_at' => '2020-07-14 06:22:44',
                'updated_at' => '2020-07-14 06:22:44',
            ),
            51 =>
            array (
                'id' => 54,
                'product_id' => 47,
                'tags_id' => 1,
                'created_at' => '2020-07-16 09:26:29',
                'updated_at' => '2020-07-16 09:26:29',
            ),
            52 =>
            array (
                'id' => 55,
                'product_id' => 84,
                'tags_id' => 1,
                'created_at' => '2020-07-17 10:02:09',
                'updated_at' => '2020-07-17 10:02:09',
            ),
            53 =>
            array (
                'id' => 56,
                'product_id' => 85,
                'tags_id' => 3,
                'created_at' => '2020-07-30 11:01:12',
                'updated_at' => '2020-07-30 11:01:12',
            ),
            54 =>
            array (
                'id' => 57,
                'product_id' => 86,
                'tags_id' => 3,
                'created_at' => '2020-07-30 11:02:37',
                'updated_at' => '2020-07-30 11:02:37',
            ),
            55 =>
            array (
                'id' => 58,
                'product_id' => 86,
                'tags_id' => 5,
                'created_at' => '2020-07-30 11:02:37',
                'updated_at' => '2020-07-30 11:02:37',
            ),
            56 =>
            array (
                'id' => 59,
                'product_id' => 111,
                'tags_id' => 1,
                'created_at' => '2020-08-25 17:52:46',
                'updated_at' => '2020-08-25 17:52:46',
            ),
            57 =>
            array (
                'id' => 60,
                'product_id' => 111,
                'tags_id' => 5,
                'created_at' => '2020-08-25 17:52:46',
                'updated_at' => '2020-08-25 17:52:46',
            ),
            58 =>
            array (
                'id' => 61,
                'product_id' => 112,
                'tags_id' => 13,
                'created_at' => '2020-08-25 18:08:36',
                'updated_at' => '2020-08-25 18:08:36',
            ),
            59 =>
            array (
                'id' => 62,
                'product_id' => 113,
                'tags_id' => 1,
                'created_at' => '2020-08-27 16:18:03',
                'updated_at' => '2020-08-27 16:18:03',
            ),
            60 =>
            array (
                'id' => 63,
                'product_id' => 113,
                'tags_id' => 2,
                'created_at' => '2020-08-27 16:18:03',
                'updated_at' => '2020-08-27 16:18:03',
            ),
            61 =>
            array (
                'id' => 64,
                'product_id' => 114,
                'tags_id' => 1,
                'created_at' => '2020-08-29 16:59:30',
                'updated_at' => '2020-08-29 16:59:30',
            ),
            62 =>
            array (
                'id' => 65,
                'product_id' => 114,
                'tags_id' => 3,
                'created_at' => '2020-08-29 16:59:30',
                'updated_at' => '2020-08-29 16:59:30',
            ),
            63 =>
            array (
                'id' => 66,
                'product_id' => 115,
                'tags_id' => 1,
                'created_at' => '2020-08-29 17:26:39',
                'updated_at' => '2020-08-29 17:26:39',
            ),
            64 =>
            array (
                'id' => 67,
                'product_id' => 115,
                'tags_id' => 4,
                'created_at' => '2020-08-29 17:26:39',
                'updated_at' => '2020-08-29 17:26:39',
            ),
            65 =>
            array (
                'id' => 68,
                'product_id' => 116,
                'tags_id' => 1,
                'created_at' => '2020-09-03 12:23:40',
                'updated_at' => '2020-09-03 12:23:40',
            ),
            66 =>
            array (
                'id' => 69,
                'product_id' => 117,
                'tags_id' => 13,
                'created_at' => '2020-09-08 20:39:20',
                'updated_at' => '2020-09-08 20:39:20',
            ),
            67 =>
            array (
                'id' => 70,
                'product_id' => 118,
                'tags_id' => 1,
                'created_at' => '2020-09-09 13:21:41',
                'updated_at' => '2020-09-09 13:21:41',
            ),
            68 =>
            array (
                'id' => 71,
                'product_id' => 119,
                'tags_id' => 13,
                'created_at' => '2020-09-09 17:29:53',
                'updated_at' => '2020-09-09 17:29:53',
            ),
            69 =>
            array (
                'id' => 72,
                'product_id' => 120,
                'tags_id' => 13,
                'created_at' => '2020-09-10 01:29:28',
                'updated_at' => '2020-09-10 01:29:28',
            ),
            70 =>
            array (
                'id' => 73,
                'product_id' => 98,
                'tags_id' => 1,
                'created_at' => '2020-09-15 18:02:06',
                'updated_at' => '2020-09-15 18:02:06',
            ),
            71 =>
            array (
                'id' => 74,
                'product_id' => 121,
                'tags_id' => 1,
                'created_at' => '2020-09-21 21:26:31',
                'updated_at' => '2020-09-21 21:26:31',
            ),
            72 =>
            array (
                'id' => 75,
                'product_id' => 121,
                'tags_id' => 3,
                'created_at' => '2020-09-21 21:26:31',
                'updated_at' => '2020-09-21 21:26:31',
            ),
            73 =>
            array (
                'id' => 76,
                'product_id' => 122,
                'tags_id' => 1,
                'created_at' => '2020-09-22 21:17:01',
                'updated_at' => '2020-09-22 21:17:01',
            ),
            74 =>
            array (
                'id' => 77,
                'product_id' => 123,
                'tags_id' => 1,
                'created_at' => '2020-09-24 17:24:09',
                'updated_at' => '2020-09-24 17:24:09',
            ),
            75 =>
            array (
                'id' => 78,
                'product_id' => 124,
                'tags_id' => 13,
                'created_at' => '2020-09-28 17:30:20',
                'updated_at' => '2020-09-28 17:30:20',
            ),
            76 =>
            array (
                'id' => 79,
                'product_id' => 49,
                'tags_id' => 1,
                'created_at' => '2020-09-30 17:22:26',
                'updated_at' => '2020-09-30 17:22:26',
            ),
            77 =>
            array (
                'id' => 80,
                'product_id' => 49,
                'tags_id' => 2,
                'created_at' => '2020-09-30 17:22:26',
                'updated_at' => '2020-09-30 17:22:26',
            ),
            78 =>
            array (
                'id' => 81,
                'product_id' => 27,
                'tags_id' => 1,
                'created_at' => '2020-10-04 11:20:53',
                'updated_at' => '2020-10-04 11:20:53',
            ),
            79 =>
            array (
                'id' => 82,
                'product_id' => 78,
                'tags_id' => 1,
                'created_at' => '2020-10-04 11:34:53',
                'updated_at' => '2020-10-04 11:34:53',
            ),
            80 =>
            array (
                'id' => 83,
                'product_id' => 77,
                'tags_id' => 1,
                'created_at' => '2020-10-04 11:40:57',
                'updated_at' => '2020-10-04 11:40:57',
            ),
            81 =>
            array (
                'id' => 84,
                'product_id' => 89,
                'tags_id' => 1,
                'created_at' => '2020-10-04 11:56:35',
                'updated_at' => '2020-10-04 11:56:35',
            ),
            82 =>
            array (
                'id' => 85,
                'product_id' => 61,
                'tags_id' => 1,
                'created_at' => '2020-10-04 13:09:42',
                'updated_at' => '2020-10-04 13:09:42',
            ),
            83 =>
            array (
                'id' => 86,
                'product_id' => 61,
                'tags_id' => 3,
                'created_at' => '2020-10-04 13:09:42',
                'updated_at' => '2020-10-04 13:09:42',
            ),
            84 =>
            array (
                'id' => 87,
                'product_id' => 56,
                'tags_id' => 1,
                'created_at' => '2020-10-04 13:50:12',
                'updated_at' => '2020-10-04 13:50:12',
            ),
            85 =>
            array (
                'id' => 89,
                'product_id' => 44,
                'tags_id' => 1,
                'created_at' => '2020-10-04 14:11:49',
                'updated_at' => '2020-10-04 14:11:49',
            ),
            86 =>
            array (
                'id' => 90,
                'product_id' => 43,
                'tags_id' => 1,
                'created_at' => '2020-10-04 14:24:47',
                'updated_at' => '2020-10-04 14:24:47',
            ),
            87 =>
            array (
                'id' => 91,
                'product_id' => 42,
                'tags_id' => 1,
                'created_at' => '2020-10-04 14:43:42',
                'updated_at' => '2020-10-04 14:43:42',
            ),
            88 =>
            array (
                'id' => 92,
                'product_id' => 41,
                'tags_id' => 1,
                'created_at' => '2020-10-04 16:15:15',
                'updated_at' => '2020-10-04 16:15:15',
            ),
            89 =>
            array (
                'id' => 93,
                'product_id' => 39,
                'tags_id' => 1,
                'created_at' => '2020-10-04 16:26:39',
                'updated_at' => '2020-10-04 16:26:39',
            ),
            90 =>
            array (
                'id' => 94,
                'product_id' => 39,
                'tags_id' => 4,
                'created_at' => '2020-10-04 16:26:39',
                'updated_at' => '2020-10-04 16:26:39',
            ),
            91 =>
            array (
                'id' => 95,
                'product_id' => 38,
                'tags_id' => 1,
                'created_at' => '2020-10-04 16:36:16',
                'updated_at' => '2020-10-04 16:36:16',
            ),
            92 =>
            array (
                'id' => 96,
                'product_id' => 94,
                'tags_id' => 1,
                'created_at' => '2020-10-05 10:54:11',
                'updated_at' => '2020-10-05 10:54:11',
            ),
            93 =>
            array (
                'id' => 97,
                'product_id' => 125,
                'tags_id' => 1,
                'created_at' => '2020-10-05 11:00:04',
                'updated_at' => '2020-10-05 11:00:04',
            ),
            94 =>
            array (
                'id' => 98,
                'product_id' => 103,
                'tags_id' => 1,
                'created_at' => '2020-10-05 11:17:38',
                'updated_at' => '2020-10-05 11:17:38',
            ),
            95 =>
            array (
                'id' => 99,
                'product_id' => 103,
                'tags_id' => 14,
                'created_at' => '2020-10-05 11:17:38',
                'updated_at' => '2020-10-05 11:17:38',
            ),
            96 =>
            array (
                'id' => 100,
                'product_id' => 28,
                'tags_id' => 1,
                'created_at' => '2020-10-05 11:36:14',
                'updated_at' => '2020-10-05 11:36:14',
            ),
            97 =>
            array (
                'id' => 101,
                'product_id' => 36,
                'tags_id' => 1,
                'created_at' => '2020-10-05 12:00:40',
                'updated_at' => '2020-10-05 12:00:40',
            ),
            98 =>
            array (
                'id' => 102,
                'product_id' => 126,
                'tags_id' => 1,
                'created_at' => '2020-10-05 12:47:38',
                'updated_at' => '2020-10-05 12:47:38',
            ),
            99 =>
            array (
                'id' => 103,
                'product_id' => 127,
                'tags_id' => 13,
                'created_at' => '2020-10-05 13:55:01',
                'updated_at' => '2020-10-05 13:55:01',
            ),
            100 =>
            array (
                'id' => 104,
                'product_id' => 128,
                'tags_id' => 13,
                'created_at' => '2020-10-05 13:59:18',
                'updated_at' => '2020-10-05 13:59:18',
            ),
            101 =>
            array (
                'id' => 105,
                'product_id' => 129,
                'tags_id' => 1,
                'created_at' => '2020-10-05 16:38:20',
                'updated_at' => '2020-10-05 16:38:20',
            ),
            102 =>
            array (
                'id' => 106,
                'product_id' => 130,
                'tags_id' => 4,
                'created_at' => '2020-10-06 12:56:11',
                'updated_at' => '2020-10-06 12:56:11',
            ),
            103 =>
            array (
                'id' => 107,
                'product_id' => 131,
                'tags_id' => 1,
                'created_at' => '2020-10-06 17:09:50',
                'updated_at' => '2020-10-06 17:09:50',
            ),
            104 =>
            array (
                'id' => 108,
                'product_id' => 132,
                'tags_id' => 1,
                'created_at' => '2020-10-07 11:05:55',
                'updated_at' => '2020-10-07 11:05:55',
            ),
            105 =>
            array (
                'id' => 109,
                'product_id' => 133,
                'tags_id' => 8,
                'created_at' => '2020-10-07 11:10:52',
                'updated_at' => '2020-10-07 11:10:52',
            ),
            106 =>
            array (
                'id' => 110,
                'product_id' => 134,
                'tags_id' => 1,
                'created_at' => '2020-10-07 11:11:58',
                'updated_at' => '2020-10-07 11:11:58',
            ),
            107 =>
            array (
                'id' => 111,
                'product_id' => 135,
                'tags_id' => 1,
                'created_at' => '2020-10-08 13:58:54',
                'updated_at' => '2020-10-08 13:58:54',
            ),
            108 =>
            array (
                'id' => 112,
                'product_id' => 136,
                'tags_id' => 3,
                'created_at' => '2020-10-11 12:09:56',
                'updated_at' => '2020-10-11 12:09:56',
            ),
            109 =>
            array (
                'id' => 113,
                'product_id' => 137,
                'tags_id' => 13,
                'created_at' => '2020-10-14 17:35:36',
                'updated_at' => '2020-10-14 17:35:36',
            ),
            110 =>
            array (
                'id' => 114,
                'product_id' => 138,
                'tags_id' => 13,
                'created_at' => '2020-10-14 17:36:58',
                'updated_at' => '2020-10-14 17:36:58',
            ),
            111 =>
            array (
                'id' => 115,
                'product_id' => 139,
                'tags_id' => 1,
                'created_at' => '2020-10-15 12:11:30',
                'updated_at' => '2020-10-15 12:11:30',
            ),
            112 =>
            array (
                'id' => 116,
                'product_id' => 140,
                'tags_id' => 1,
                'created_at' => '2020-10-15 12:14:40',
                'updated_at' => '2020-10-15 12:14:40',
            ),
            113 =>
            array (
                'id' => 117,
                'product_id' => 141,
                'tags_id' => 13,
                'created_at' => '2020-10-17 10:40:00',
                'updated_at' => '2020-10-17 10:40:00',
            ),
            114 =>
            array (
                'id' => 118,
                'product_id' => 142,
                'tags_id' => 1,
                'created_at' => '2020-10-18 15:56:03',
                'updated_at' => '2020-10-18 15:56:03',
            ),
            115 =>
            array (
                'id' => 119,
                'product_id' => 63,
                'tags_id' => 1,
                'created_at' => '2020-10-21 16:13:32',
                'updated_at' => '2020-10-21 16:13:32',
            ),
            116 =>
            array (
                'id' => 120,
                'product_id' => 35,
                'tags_id' => 1,
                'created_at' => '2020-10-23 15:35:39',
                'updated_at' => '2020-10-23 15:35:39',
            ),
            117 =>
            array (
                'id' => 121,
                'product_id' => 143,
                'tags_id' => 1,
                'created_at' => '2020-10-24 17:57:18',
                'updated_at' => '2020-10-24 17:57:18',
            ),
            118 =>
            array (
                'id' => 122,
                'product_id' => 57,
                'tags_id' => 1,
                'created_at' => '2020-10-25 15:14:38',
                'updated_at' => '2020-10-25 15:14:38',
            ),
            119 =>
            array (
                'id' => 123,
                'product_id' => 144,
                'tags_id' => 13,
                'created_at' => '2020-10-27 17:17:30',
                'updated_at' => '2020-10-27 17:17:30',
            ),
            120 =>
            array (
                'id' => 124,
                'product_id' => 145,
                'tags_id' => 1,
                'created_at' => '2020-11-01 18:06:05',
                'updated_at' => '2020-11-01 18:06:05',
            ),
            121 =>
            array (
                'id' => 125,
                'product_id' => 93,
                'tags_id' => 1,
                'created_at' => '2020-11-02 12:57:12',
                'updated_at' => '2020-11-02 12:57:12',
            ),
            122 =>
            array (
                'id' => 126,
                'product_id' => 59,
                'tags_id' => 1,
                'created_at' => '2020-11-02 14:07:09',
                'updated_at' => '2020-11-02 14:07:09',
            ),
            123 =>
            array (
                'id' => 127,
                'product_id' => 146,
                'tags_id' => 1,
                'created_at' => '2020-11-07 11:34:36',
                'updated_at' => '2020-11-07 11:34:36',
            ),
            124 =>
            array (
                'id' => 128,
                'product_id' => 147,
                'tags_id' => 1,
                'created_at' => '2020-11-07 11:53:56',
                'updated_at' => '2020-11-07 11:53:56',
            ),
            125 =>
            array (
                'id' => 129,
                'product_id' => 148,
                'tags_id' => 1,
                'created_at' => '2020-11-07 12:20:56',
                'updated_at' => '2020-11-07 12:20:56',
            ),
            126 =>
            array (
                'id' => 130,
                'product_id' => 149,
                'tags_id' => 1,
                'created_at' => '2020-11-07 13:25:29',
                'updated_at' => '2020-11-07 13:25:29',
            ),
            127 =>
            array (
                'id' => 131,
                'product_id' => 150,
                'tags_id' => 1,
                'created_at' => '2020-11-07 13:41:38',
                'updated_at' => '2020-11-07 13:41:38',
            ),
            128 =>
            array (
                'id' => 132,
                'product_id' => 151,
                'tags_id' => 1,
                'created_at' => '2020-11-07 13:43:54',
                'updated_at' => '2020-11-07 13:43:54',
            ),
            129 =>
            array (
                'id' => 133,
                'product_id' => 45,
                'tags_id' => 1,
                'created_at' => '2020-11-07 16:31:28',
                'updated_at' => '2020-11-07 16:31:28',
            ),
            130 =>
            array (
                'id' => 134,
                'product_id' => 73,
                'tags_id' => 1,
                'created_at' => '2020-11-09 12:41:15',
                'updated_at' => '2020-11-09 12:41:15',
            ),
            131 =>
            array (
                'id' => 135,
                'product_id' => 152,
                'tags_id' => 1,
                'created_at' => '2020-11-09 12:55:04',
                'updated_at' => '2020-11-09 12:55:04',
            ),
            132 =>
            array (
                'id' => 136,
                'product_id' => 153,
                'tags_id' => 1,
                'created_at' => '2020-11-09 12:56:18',
                'updated_at' => '2020-11-09 12:56:18',
            ),
            133 =>
            array (
                'id' => 137,
                'product_id' => 154,
                'tags_id' => 1,
                'created_at' => '2020-11-09 12:57:31',
                'updated_at' => '2020-11-09 12:57:31',
            ),
            134 =>
            array (
                'id' => 138,
                'product_id' => 155,
                'tags_id' => 1,
                'created_at' => '2020-11-09 12:58:22',
                'updated_at' => '2020-11-09 12:58:22',
            ),
            135 =>
            array (
                'id' => 139,
                'product_id' => 156,
                'tags_id' => 1,
                'created_at' => '2020-11-09 20:02:16',
                'updated_at' => '2020-11-09 20:02:16',
            ),
            136 =>
            array (
                'id' => 140,
                'product_id' => 157,
                'tags_id' => 13,
                'created_at' => '2020-11-09 20:03:04',
                'updated_at' => '2020-11-09 20:03:04',
            ),
            137 =>
            array (
                'id' => 141,
                'product_id' => 158,
                'tags_id' => 13,
                'created_at' => '2020-11-09 20:03:58',
                'updated_at' => '2020-11-09 20:03:58',
            ),
            138 =>
            array (
                'id' => 142,
                'product_id' => 26,
                'tags_id' => 1,
                'created_at' => '2020-11-15 13:29:02',
                'updated_at' => '2020-11-15 13:29:02',
            ),
            139 =>
            array (
                'id' => 143,
                'product_id' => 159,
                'tags_id' => 1,
                'created_at' => '2020-11-21 13:46:23',
                'updated_at' => '2020-11-21 13:46:23',
            ),
            140 =>
            array (
                'id' => 144,
                'product_id' => 160,
                'tags_id' => 1,
                'created_at' => '2020-11-21 13:54:26',
                'updated_at' => '2020-11-21 13:54:26',
            ),
            141 =>
            array (
                'id' => 145,
                'product_id' => 37,
                'tags_id' => 1,
                'created_at' => '2020-11-26 11:30:45',
                'updated_at' => '2020-11-26 11:30:45',
            ),
            142 =>
            array (
                'id' => 146,
                'product_id' => 161,
                'tags_id' => 12,
                'created_at' => '2020-11-26 15:54:37',
                'updated_at' => '2020-11-26 15:54:37',
            ),
            143 =>
            array (
                'id' => 147,
                'product_id' => 162,
                'tags_id' => 1,
                'created_at' => '2020-11-26 18:43:45',
                'updated_at' => '2020-11-26 18:43:45',
            ),
            144 =>
            array (
                'id' => 148,
                'product_id' => 163,
                'tags_id' => 4,
                'created_at' => '2020-11-26 23:45:58',
                'updated_at' => '2020-11-26 23:45:58',
            ),
            145 =>
            array (
                'id' => 149,
                'product_id' => 164,
                'tags_id' => 1,
                'created_at' => '2020-11-26 23:47:49',
                'updated_at' => '2020-11-26 23:47:49',
            ),
            146 =>
            array (
                'id' => 150,
                'product_id' => 165,
                'tags_id' => 1,
                'created_at' => '2020-11-26 23:49:09',
                'updated_at' => '2020-11-26 23:49:09',
            ),
            147 =>
            array (
                'id' => 151,
                'product_id' => 166,
                'tags_id' => 1,
                'created_at' => '2020-11-26 23:50:38',
                'updated_at' => '2020-11-26 23:50:38',
            ),
            148 =>
            array (
                'id' => 152,
                'product_id' => 167,
                'tags_id' => 15,
                'created_at' => '2020-11-26 23:53:04',
                'updated_at' => '2020-11-26 23:53:04',
            ),
            149 =>
            array (
                'id' => 153,
                'product_id' => 168,
                'tags_id' => 6,
                'created_at' => '2020-11-26 23:54:29',
                'updated_at' => '2020-11-26 23:54:29',
            ),
            150 =>
            array (
                'id' => 154,
                'product_id' => 169,
                'tags_id' => 5,
                'created_at' => '2020-11-26 23:55:47',
                'updated_at' => '2020-11-26 23:55:47',
            ),
            151 =>
            array (
                'id' => 155,
                'product_id' => 170,
                'tags_id' => 6,
                'created_at' => '2020-11-26 23:57:09',
                'updated_at' => '2020-11-26 23:57:09',
            ),
            152 =>
            array (
                'id' => 156,
                'product_id' => 171,
                'tags_id' => 6,
                'created_at' => '2020-11-26 23:58:02',
                'updated_at' => '2020-11-26 23:58:02',
            ),
            153 =>
            array (
                'id' => 158,
                'product_id' => 173,
                'tags_id' => 1,
                'created_at' => '2020-11-27 00:09:25',
                'updated_at' => '2020-11-27 00:09:25',
            ),
            154 =>
            array (
                'id' => 159,
                'product_id' => 174,
                'tags_id' => 1,
                'created_at' => '2020-11-28 12:38:01',
                'updated_at' => '2020-11-28 12:38:01',
            ),
            155 =>
            array (
                'id' => 160,
                'product_id' => 175,
                'tags_id' => 7,
                'created_at' => '2020-11-29 07:53:18',
                'updated_at' => '2020-11-29 07:53:18',
            ),
            156 =>
            array (
                'id' => 161,
                'product_id' => 176,
                'tags_id' => 13,
                'created_at' => '2020-11-30 13:49:57',
                'updated_at' => '2020-11-30 13:49:57',
            ),
            157 =>
            array (
                'id' => 162,
                'product_id' => 177,
                'tags_id' => 10,
                'created_at' => '2020-11-30 20:54:53',
                'updated_at' => '2020-11-30 20:54:53',
            ),
            158 =>
            array (
                'id' => 163,
                'product_id' => 178,
                'tags_id' => 1,
                'created_at' => '2020-12-03 17:15:27',
                'updated_at' => '2020-12-03 17:15:27',
            ),
            159 =>
            array (
                'id' => 164,
                'product_id' => 179,
                'tags_id' => 1,
                'created_at' => '2020-12-03 18:46:10',
                'updated_at' => '2020-12-03 18:46:10',
            ),
            160 =>
            array (
                'id' => 165,
                'product_id' => 180,
                'tags_id' => 1,
                'created_at' => '2020-12-03 18:51:38',
                'updated_at' => '2020-12-03 18:51:38',
            ),
            161 =>
            array (
                'id' => 166,
                'product_id' => 181,
                'tags_id' => 1,
                'created_at' => '2020-12-05 15:56:19',
                'updated_at' => '2020-12-05 15:56:19',
            ),
            162 =>
            array (
                'id' => 167,
                'product_id' => 182,
                'tags_id' => 1,
                'created_at' => '2020-12-05 16:03:20',
                'updated_at' => '2020-12-05 16:03:20',
            ),
            163 =>
            array (
                'id' => 168,
                'product_id' => 183,
                'tags_id' => 13,
                'created_at' => '2020-12-05 17:07:01',
                'updated_at' => '2020-12-05 17:07:01',
            ),
            164 =>
            array (
                'id' => 169,
                'product_id' => 184,
                'tags_id' => 8,
                'created_at' => '2020-12-08 15:34:23',
                'updated_at' => '2020-12-08 15:34:23',
            ),
            165 =>
            array (
                'id' => 170,
                'product_id' => 185,
                'tags_id' => 1,
                'created_at' => '2020-12-09 17:54:07',
                'updated_at' => '2020-12-09 17:54:07',
            ),
            166 =>
            array (
                'id' => 171,
                'product_id' => 187,
                'tags_id' => 1,
                'created_at' => '2020-12-13 18:38:54',
                'updated_at' => '2020-12-13 18:38:54',
            ),
            167 =>
            array (
                'id' => 172,
                'product_id' => 188,
                'tags_id' => 9,
                'created_at' => '2020-12-21 13:09:42',
                'updated_at' => '2020-12-21 13:09:42',
            ),
            168 =>
            array (
                'id' => 173,
                'product_id' => 189,
                'tags_id' => 9,
                'created_at' => '2020-12-21 13:10:56',
                'updated_at' => '2020-12-21 13:10:56',
            ),
            169 =>
            array (
                'id' => 174,
                'product_id' => 190,
                'tags_id' => 9,
                'created_at' => '2020-12-21 13:11:27',
                'updated_at' => '2020-12-21 13:11:27',
            ),
            170 =>
            array (
                'id' => 175,
                'product_id' => 191,
                'tags_id' => 1,
                'created_at' => '2020-12-21 16:56:22',
                'updated_at' => '2020-12-21 16:56:22',
            ),
            171 =>
            array (
                'id' => 176,
                'product_id' => 192,
                'tags_id' => 16,
                'created_at' => '2020-12-31 15:24:21',
                'updated_at' => '2020-12-31 15:24:21',
            ),
            172 =>
            array (
                'id' => 177,
                'product_id' => 193,
                'tags_id' => 2,
                'created_at' => '2021-01-03 17:36:59',
                'updated_at' => '2021-01-03 17:36:59',
            ),
            173 =>
            array (
                'id' => 178,
                'product_id' => 194,
                'tags_id' => 1,
                'created_at' => '2021-01-04 16:41:12',
                'updated_at' => '2021-01-04 16:41:12',
            ),
            174 =>
            array (
                'id' => 179,
                'product_id' => 172,
                'tags_id' => 18,
                'created_at' => '2021-01-04 16:46:51',
                'updated_at' => '2021-01-04 16:46:51',
            ),
            175 =>
            array (
                'id' => 180,
                'product_id' => 195,
                'tags_id' => 18,
                'created_at' => '2021-01-04 16:48:10',
                'updated_at' => '2021-01-04 16:48:10',
            ),
            176 =>
            array (
                'id' => 181,
                'product_id' => 196,
                'tags_id' => 18,
                'created_at' => '2021-01-04 16:49:22',
                'updated_at' => '2021-01-04 16:49:22',
            ),
            177 =>
            array (
                'id' => 182,
                'product_id' => 29,
                'tags_id' => 1,
                'created_at' => '2021-01-18 07:22:42',
                'updated_at' => '2021-01-18 07:22:42',
            ),
            178 =>
            array (
                'id' => 183,
                'product_id' => 30,
                'tags_id' => 1,
                'created_at' => '2021-01-18 11:30:11',
                'updated_at' => '2021-01-18 11:30:11',
            ),
            179 =>
            array (
                'id' => 184,
                'product_id' => 30,
                'tags_id' => 4,
                'created_at' => '2021-01-18 11:30:11',
                'updated_at' => '2021-01-18 11:30:11',
            ),
            180 =>
            array (
                'id' => 185,
                'product_id' => 54,
                'tags_id' => 1,
                'created_at' => '2021-01-18 11:34:30',
                'updated_at' => '2021-01-18 11:34:30',
            ),
            181 =>
            array (
                'id' => 186,
                'product_id' => 107,
                'tags_id' => 13,
                'created_at' => '2021-01-18 11:41:05',
                'updated_at' => '2021-01-18 11:41:05',
            ),
            182 =>
            array (
                'id' => 187,
                'product_id' => 68,
                'tags_id' => 1,
                'created_at' => '2021-01-18 11:48:44',
                'updated_at' => '2021-01-18 11:48:44',
            ),
            183 =>
            array (
                'id' => 188,
                'product_id' => 110,
                'tags_id' => 13,
                'created_at' => '2021-01-18 11:49:56',
                'updated_at' => '2021-01-18 11:49:56',
            ),
            184 =>
            array (
                'id' => 189,
                'product_id' => 197,
                'tags_id' => 13,
                'created_at' => '2021-01-18 11:56:48',
                'updated_at' => '2021-01-18 11:56:48',
            ),
            185 =>
            array (
                'id' => 190,
                'product_id' => 33,
                'tags_id' => 1,
                'created_at' => '2021-01-18 12:01:43',
                'updated_at' => '2021-01-18 12:01:43',
            ),
            186 =>
            array (
                'id' => 191,
                'product_id' => 67,
                'tags_id' => 13,
                'created_at' => '2021-01-18 12:04:03',
                'updated_at' => '2021-01-18 12:04:03',
            ),
            187 =>
            array (
                'id' => 192,
                'product_id' => 71,
                'tags_id' => 13,
                'created_at' => '2021-01-18 12:07:54',
                'updated_at' => '2021-01-18 12:07:54',
            ),
            188 =>
            array (
                'id' => 193,
                'product_id' => 70,
                'tags_id' => 13,
                'created_at' => '2021-01-18 12:30:48',
                'updated_at' => '2021-01-18 12:30:48',
            ),
            189 =>
            array (
                'id' => 194,
                'product_id' => 198,
                'tags_id' => 13,
                'created_at' => '2021-01-18 12:42:47',
                'updated_at' => '2021-01-18 12:42:47',
            ),
            190 =>
            array (
                'id' => 195,
                'product_id' => 58,
                'tags_id' => 1,
                'created_at' => '2021-01-18 13:09:43',
                'updated_at' => '2021-01-18 13:09:43',
            ),
            191 =>
            array (
                'id' => 196,
                'product_id' => 46,
                'tags_id' => 13,
                'created_at' => '2021-01-18 14:56:57',
                'updated_at' => '2021-01-18 14:56:57',
            ),
            192 =>
            array (
                'id' => 197,
                'product_id' => 69,
                'tags_id' => 13,
                'created_at' => '2021-01-19 10:15:24',
                'updated_at' => '2021-01-19 10:15:24',
            ),
            193 =>
            array (
                'id' => 198,
                'product_id' => 65,
                'tags_id' => 13,
                'created_at' => '2021-01-19 10:17:51',
                'updated_at' => '2021-01-19 10:17:51',
            ),
            194 =>
            array (
                'id' => 199,
                'product_id' => 76,
                'tags_id' => 4,
                'created_at' => '2021-01-19 10:25:06',
                'updated_at' => '2021-01-19 10:25:06',
            ),
            195 =>
            array (
                'id' => 200,
                'product_id' => 31,
                'tags_id' => 1,
                'created_at' => '2021-01-19 12:39:52',
                'updated_at' => '2021-01-19 12:39:52',
            ),
            196 =>
            array (
                'id' => 201,
                'product_id' => 88,
                'tags_id' => 1,
                'created_at' => '2021-01-24 11:52:22',
                'updated_at' => '2021-01-24 11:52:22',
            ),
            197 =>
            array (
                'id' => 202,
                'product_id' => 88,
                'tags_id' => 2,
                'created_at' => '2021-01-24 11:52:22',
                'updated_at' => '2021-01-24 11:52:22',
            ),
            198 =>
            array (
                'id' => 203,
                'product_id' => 199,
                'tags_id' => 1,
                'created_at' => '2021-01-24 12:01:37',
                'updated_at' => '2021-01-24 12:01:37',
            ),
            199 =>
            array (
                'id' => 204,
                'product_id' => 200,
                'tags_id' => 13,
                'created_at' => '2021-01-26 18:10:27',
                'updated_at' => '2021-01-26 18:10:27',
            ),
            200 =>
            array (
                'id' => 205,
                'product_id' => 201,
                'tags_id' => 13,
                'created_at' => '2021-01-27 14:36:08',
                'updated_at' => '2021-01-27 14:36:08',
            ),
            201 =>
            array (
                'id' => 206,
                'product_id' => 202,
                'tags_id' => 13,
                'created_at' => '2021-01-27 14:38:34',
                'updated_at' => '2021-01-27 14:38:34',
            ),
            202 =>
            array (
                'id' => 207,
                'product_id' => 203,
                'tags_id' => 13,
                'created_at' => '2021-01-27 14:42:21',
                'updated_at' => '2021-01-27 14:42:21',
            ),
            203 =>
            array (
                'id' => 208,
                'product_id' => 91,
                'tags_id' => 1,
                'created_at' => '2021-02-01 15:36:00',
                'updated_at' => '2021-02-01 15:36:00',
            ),
            204 =>
            array (
                'id' => 209,
                'product_id' => 34,
                'tags_id' => 1,
                'created_at' => '2021-02-01 15:55:07',
                'updated_at' => '2021-02-01 15:55:07',
            ),
            205 =>
            array (
                'id' => 210,
                'product_id' => 204,
                'tags_id' => 1,
                'created_at' => '2021-02-03 14:56:00',
                'updated_at' => '2021-02-03 14:56:00',
            ),
            206 =>
            array (
                'id' => 211,
                'product_id' => 205,
                'tags_id' => 1,
                'created_at' => '2021-02-03 15:29:17',
                'updated_at' => '2021-02-03 15:29:17',
            ),
            207 =>
            array (
                'id' => 212,
                'product_id' => 206,
                'tags_id' => 1,
                'created_at' => '2021-02-04 15:03:32',
                'updated_at' => '2021-02-04 15:03:32',
            ),
            208 =>
            array (
                'id' => 213,
                'product_id' => 207,
                'tags_id' => 1,
                'created_at' => '2021-02-08 17:31:03',
                'updated_at' => '2021-02-08 17:31:03',
            ),
            209 =>
            array (
                'id' => 214,
                'product_id' => 208,
                'tags_id' => 1,
                'created_at' => '2021-02-08 17:32:01',
                'updated_at' => '2021-02-08 17:32:01',
            ),
            210 =>
            array (
                'id' => 215,
                'product_id' => 209,
                'tags_id' => 1,
                'created_at' => '2021-02-08 17:35:32',
                'updated_at' => '2021-02-08 17:35:32',
            ),
            211 =>
            array (
                'id' => 216,
                'product_id' => 210,
                'tags_id' => 1,
                'created_at' => '2021-02-08 17:36:28',
                'updated_at' => '2021-02-08 17:36:28',
            ),
            212 =>
            array (
                'id' => 217,
                'product_id' => 211,
                'tags_id' => 4,
                'created_at' => '2021-02-11 15:35:20',
                'updated_at' => '2021-02-11 15:35:20',
            ),
            213 =>
            array (
                'id' => 218,
                'product_id' => 212,
                'tags_id' => 1,
                'created_at' => '2021-02-15 11:38:33',
                'updated_at' => '2021-02-15 11:38:33',
            ),
            214 =>
            array (
                'id' => 219,
                'product_id' => 213,
                'tags_id' => 1,
                'created_at' => '2021-02-15 11:39:47',
                'updated_at' => '2021-02-15 11:39:47',
            ),
            215 =>
            array (
                'id' => 220,
                'product_id' => 214,
                'tags_id' => 1,
                'created_at' => '2021-02-15 11:52:55',
                'updated_at' => '2021-02-15 11:52:55',
            ),
            216 =>
            array (
                'id' => 221,
                'product_id' => 215,
                'tags_id' => 1,
                'created_at' => '2021-02-15 11:53:46',
                'updated_at' => '2021-02-15 11:53:46',
            ),
            217 =>
            array (
                'id' => 222,
                'product_id' => 48,
                'tags_id' => 19,
                'created_at' => '2021-02-17 15:15:43',
                'updated_at' => '2021-02-17 15:15:43',
            ),
            218 =>
            array (
                'id' => 223,
                'product_id' => 53,
                'tags_id' => 3,
                'created_at' => '2021-02-17 15:16:45',
                'updated_at' => '2021-02-17 15:16:45',
            ),
            219 =>
            array (
                'id' => 224,
                'product_id' => 72,
                'tags_id' => 19,
                'created_at' => '2021-02-17 15:20:10',
                'updated_at' => '2021-02-17 15:20:10',
            ),
            220 =>
            array (
                'id' => 225,
                'product_id' => 79,
                'tags_id' => 19,
                'created_at' => '2021-02-17 15:24:36',
                'updated_at' => '2021-02-17 15:24:36',
            ),
            221 =>
            array (
                'id' => 226,
                'product_id' => 88,
                'tags_id' => 19,
                'created_at' => '2021-02-17 15:25:18',
                'updated_at' => '2021-02-17 15:25:18',
            ),
            222 =>
            array (
                'id' => 227,
                'product_id' => 147,
                'tags_id' => 19,
                'created_at' => '2021-02-17 15:26:29',
                'updated_at' => '2021-02-17 15:26:29',
            ),
            223 =>
            array (
                'id' => 228,
                'product_id' => 216,
                'tags_id' => 19,
                'created_at' => '2021-02-24 15:28:34',
                'updated_at' => '2021-02-24 15:28:34',
            ),
            224 =>
            array (
                'id' => 229,
                'product_id' => 217,
                'tags_id' => 1,
                'created_at' => '2021-02-24 15:30:17',
                'updated_at' => '2021-02-24 15:30:17',
            ),
            225 =>
            array (
                'id' => 230,
                'product_id' => 217,
                'tags_id' => 19,
                'created_at' => '2021-02-24 15:30:17',
                'updated_at' => '2021-02-24 15:30:17',
            ),
            226 =>
            array (
                'id' => 231,
                'product_id' => 218,
                'tags_id' => 19,
                'created_at' => '2021-02-24 15:34:46',
                'updated_at' => '2021-02-24 15:34:46',
            ),
            227 =>
            array (
                'id' => 232,
                'product_id' => 219,
                'tags_id' => 4,
                'created_at' => '2021-02-24 16:29:43',
                'updated_at' => '2021-02-24 16:29:43',
            ),
            228 =>
            array (
                'id' => 233,
                'product_id' => 220,
                'tags_id' => 13,
                'created_at' => '2021-03-02 12:14:34',
                'updated_at' => '2021-03-02 12:14:34',
            ),
            229 =>
            array (
                'id' => 234,
                'product_id' => 221,
                'tags_id' => 13,
                'created_at' => '2021-03-02 15:27:48',
                'updated_at' => '2021-03-02 15:27:48',
            ),
            230 =>
            array (
                'id' => 235,
                'product_id' => 222,
                'tags_id' => 3,
                'created_at' => '2021-03-03 18:16:32',
                'updated_at' => '2021-03-03 18:16:32',
            ),
            231 =>
            array (
                'id' => 236,
                'product_id' => 223,
                'tags_id' => 3,
                'created_at' => '2021-03-04 11:14:06',
                'updated_at' => '2021-03-04 11:14:06',
            ),
            232 =>
            array (
                'id' => 237,
                'product_id' => 224,
                'tags_id' => 1,
                'created_at' => '2021-03-07 15:21:23',
                'updated_at' => '2021-03-07 15:21:23',
            ),
            233 =>
            array (
                'id' => 238,
                'product_id' => 225,
                'tags_id' => 3,
                'created_at' => '2021-04-04 17:26:40',
                'updated_at' => '2021-04-04 17:26:40',
            ),
            234 =>
            array (
                'id' => 239,
                'product_id' => 226,
                'tags_id' => 9,
                'created_at' => '2021-04-06 12:01:38',
                'updated_at' => '2021-04-06 12:01:38',
            ),
            235 =>
            array (
                'id' => 240,
                'product_id' => 227,
                'tags_id' => 6,
                'created_at' => '2021-04-11 20:03:52',
                'updated_at' => '2021-04-11 20:03:52',
            ),
            236 =>
            array (
                'id' => 241,
                'product_id' => 228,
                'tags_id' => 13,
                'created_at' => '2021-04-12 15:13:46',
                'updated_at' => '2021-04-12 15:13:46',
            ),
            237 =>
            array (
                'id' => 242,
                'product_id' => 229,
                'tags_id' => 9,
                'created_at' => '2021-05-02 12:57:03',
                'updated_at' => '2021-05-02 12:57:03',
            ),
            238 =>
            array (
                'id' => 244,
                'product_id' => 230,
                'tags_id' => 19,
                'created_at' => '2021-05-12 12:50:08',
                'updated_at' => '2021-05-12 12:50:08',
            ),
            239 =>
            array (
                'id' => 245,
                'product_id' => 230,
                'tags_id' => 2,
                'created_at' => '2021-05-12 12:53:06',
                'updated_at' => '2021-05-12 12:53:06',
            ),
            240 =>
            array (
                'id' => 246,
                'product_id' => 231,
                'tags_id' => 9,
                'created_at' => '2021-05-18 14:47:23',
                'updated_at' => '2021-05-18 14:47:23',
            ),
            241 =>
            array (
                'id' => 247,
                'product_id' => 232,
                'tags_id' => 9,
                'created_at' => '2021-06-20 18:54:33',
                'updated_at' => '2021-06-20 18:54:33',
            ),
            242 =>
            array (
                'id' => 248,
                'product_id' => 233,
                'tags_id' => 4,
                'created_at' => '2021-07-10 22:22:58',
                'updated_at' => '2021-07-10 22:22:58',
            ),
            243 =>
            array (
                'id' => 249,
                'product_id' => 234,
                'tags_id' => 3,
                'created_at' => '2021-07-10 22:26:52',
                'updated_at' => '2021-07-10 22:26:52',
            ),
            244 =>
            array (
                'id' => 250,
                'product_id' => 235,
                'tags_id' => 1,
                'created_at' => '2021-08-03 15:14:40',
                'updated_at' => '2021-08-03 15:14:40',
            ),
            245 =>
            array (
                'id' => 251,
                'product_id' => 236,
                'tags_id' => 1,
                'created_at' => '2021-08-05 06:20:46',
                'updated_at' => '2021-08-05 06:20:46',
            ),
            246 =>
            array (
                'id' => 252,
                'product_id' => 237,
                'tags_id' => 1,
                'created_at' => '2021-08-06 00:23:45',
                'updated_at' => '2021-08-06 00:23:45',
            ),
            247 =>
            array (
                'id' => 253,
                'product_id' => 238,
                'tags_id' => 9,
                'created_at' => '2021-08-15 00:14:21',
                'updated_at' => '2021-08-15 00:14:21',
            ),
            248 =>
            array (
                'id' => 254,
                'product_id' => 239,
                'tags_id' => 9,
                'created_at' => '2021-08-15 00:17:08',
                'updated_at' => '2021-08-15 00:17:08',
            ),
            249 =>
            array (
                'id' => 255,
                'product_id' => 240,
                'tags_id' => 9,
                'created_at' => '2021-08-16 14:16:13',
                'updated_at' => '2021-08-16 14:16:13',
            ),
            250 =>
            array (
                'id' => 256,
                'product_id' => 241,
                'tags_id' => 9,
                'created_at' => '2021-08-21 12:24:51',
                'updated_at' => '2021-08-21 12:24:51',
            ),
            251 =>
            array (
                'id' => 257,
                'product_id' => 242,
                'tags_id' => 3,
                'created_at' => '2021-08-26 11:07:14',
                'updated_at' => '2021-08-26 11:07:14',
            ),
            252 =>
            array (
                'id' => 258,
                'product_id' => 243,
                'tags_id' => 9,
                'created_at' => '2021-09-01 18:49:36',
                'updated_at' => '2021-09-01 18:49:36',
            ),
            253 =>
            array (
                'id' => 259,
                'product_id' => 244,
                'tags_id' => 9,
                'created_at' => '2021-09-26 16:07:57',
                'updated_at' => '2021-09-26 16:07:57',
            ),
            254 =>
            array (
                'id' => 260,
                'product_id' => 245,
                'tags_id' => 4,
                'created_at' => '2021-10-03 16:59:53',
                'updated_at' => '2021-10-03 16:59:53',
            ),
            255 =>
            array (
                'id' => 261,
                'product_id' => 246,
                'tags_id' => 4,
                'created_at' => '2021-10-03 18:01:01',
                'updated_at' => '2021-10-03 18:01:01',
            ),
            256 =>
            array (
                'id' => 262,
                'product_id' => 247,
                'tags_id' => 20,
                'created_at' => '2021-10-12 00:47:55',
                'updated_at' => '2021-10-12 00:47:55',
            ),
            257 =>
            array (
                'id' => 263,
                'product_id' => 248,
                'tags_id' => 4,
                'created_at' => '2021-10-12 19:14:20',
                'updated_at' => '2021-10-12 19:14:20',
            ),
            258 =>
            array (
                'id' => 264,
                'product_id' => 249,
                'tags_id' => 10,
                'created_at' => '2021-10-28 18:08:49',
                'updated_at' => '2021-10-28 18:08:49',
            ),
            259 =>
            array (
                'id' => 265,
                'product_id' => 250,
                'tags_id' => 20,
                'created_at' => '2021-11-09 16:23:25',
                'updated_at' => '2021-11-09 16:23:25',
            ),
        ));


    }
}
