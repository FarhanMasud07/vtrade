<?php

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('suppliers')->delete();

        \DB::table('suppliers')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Purchase',
                'company' => 'Demo Comapny',
                'address' => 'Dhaka',
                'email' => 'info@example.com',
                'phone' => '01700554466',
                'created_at' => '2020-06-14 00:10:18',
                'updated_at' => '2020-12-10 15:53:57',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Md Sayeed',
                'company' => 'Sayed Enterprise',
                'address' => 'Bogura, Rajshahi',
                'email' => 'visioncosmetics82@gmail.com',
                'phone' => '01718288298',
                'created_at' => '2020-12-07 16:26:44',
                'updated_at' => '2020-12-07 16:26:44',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Fajlur Rahman',
                'company' => 'A B good Health',
                'address' => 'Elephant road ,Dhaka',
                'email' => 'asafplabon@gmail.com',
                'phone' => '01713174756',
                'created_at' => '2020-12-07 17:25:29',
                'updated_at' => '2020-12-07 17:25:29',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Ripon perfume',
                'company' => 'Chemical',
                'address' => 'Midford, Dhaka',
                'email' => 'visiontradeinternational22@gmail.com',
                'phone' => '01687371771',
                'created_at' => '2020-12-09 13:35:45',
                'updated_at' => '2020-12-09 13:35:45',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Md. Joy',
                'company' => 'plastic',
                'address' => 'section, police camp',
                'email' => 'joyplastic88@gmail.com',
                'phone' => '01915722315',
                'created_at' => '2020-12-09 13:38:21',
                'updated_at' => '2020-12-09 13:38:21',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'waliwallah',
                'company' => 'S.S plastic',
                'address' => 'kamrangir chor',
                'email' => 'sspplastic@gmail.com',
                'phone' => '01712335968',
                'created_at' => '2020-12-10 12:43:16',
                'updated_at' => '2020-12-10 12:43:16',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Monir plastic',
                'company' => 'plastic',
                'address' => 'kamrangir chor',
                'email' => 'moni8rplastic@gmail.com',
                'phone' => '01715511555',
                'created_at' => '2020-12-10 12:45:35',
                'updated_at' => '2020-12-10 12:45:35',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Biovencer Healthcare Ltd.',
                'company' => 'Healthcare  Ltd.',
                'address' => 'Greater Noida,Delhi',
                'email' => 'mdsaabir2606@gmail.com',
                'phone' => '01729884554',
                'created_at' => '2020-12-12 13:58:47',
                'updated_at' => '2020-12-12 13:58:47',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Mr. Manish Rachh',
                'company' => 'Elegant Cosmed Pvt. Ltd',
                'address' => 'Plot No. 32&33,G.I.D.C Estate, Rajkot-Ahmedabad Hwy, Kuvadva, Gujrat-360023, India.',
                'email' => 'medicarebd09@gmail.com',
                'phone' => '+919998182980',
                'created_at' => '2020-12-22 00:08:58',
                'updated_at' => '2020-12-22 00:08:58',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'Parul Rachh',
                'company' => 'Glessom Cosmed Pvt. Ltd',
                'address' => 'Heera Complex, Vidya Nagar Main Rd Manhar Plot Corner, Bhakti Nagar, Rajkot, Gujrat 360002, India.',
                'email' => 'ma',
                'phone' => '+919998182981',
                'created_at' => '2020-12-22 00:15:06',
                'updated_at' => '2020-12-22 00:15:06',
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'Mr Rajib Garj',
                'company' => 'Ancalima Life science Pvt. Ltd',
                'address' => '50th K. M. Stone , National High way no.1, Murthal, sonipath, Haryana 131039, India.',
                'email' => NULL,
                'phone' => '+911302484108',
                'created_at' => '2020-12-22 00:18:29',
                'updated_at' => '2020-12-22 00:18:29',
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'Mr Manzoor Ahsan',
                'company' => 'Premiaflex pvt ltd',
                'address' => 'Mawna Fulbaira, Kaliakair , Dhamrai, Dulivita Rd, Mawna Union.',
                'email' => NULL,
                'phone' => '01713053282',
                'created_at' => '2020-12-22 00:24:13',
                'updated_at' => '2020-12-22 00:24:13',
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'Md Azizul Haque',
                'company' => 'Premiaflex pvt ltd',
                'address' => 'Mawna',
                'email' => NULL,
                'phone' => '011704114314',
                'created_at' => '2020-12-22 00:26:07',
                'updated_at' => '2020-12-22 00:26:07',
            ),
            13 =>
            array (
                'id' => 14,
                'name' => 'Mr. Debasish',
                'company' => 'Premiaflex pvt ltd',
                'address' => 'mawna',
                'email' => NULL,
                'phone' => '01704114336',
                'created_at' => '2020-12-22 00:27:13',
                'updated_at' => '2020-12-22 00:27:13',
            ),
            14 =>
            array (
                'id' => 15,
                'name' => 'Md Khalilur Rahman',
                'company' => 'Padma lamitube pvt. ltd',
                'address' => '32, 1 dilu road, Dhaka 1000.',
                'email' => NULL,
                'phone' => '01841234523',
                'created_at' => '2020-12-22 00:30:00',
                'updated_at' => '2020-12-22 00:30:00',
            ),
            15 =>
            array (
                'id' => 16,
                'name' => 'Md Mahsin',
                'company' => 'Padma lamitube pvt. ltd',
                'address' => '32, 1 Dilu road, Dhaka-1000.',
                'email' => NULL,
                'phone' => '01775068222',
                'created_at' => '2020-12-22 00:31:29',
                'updated_at' => '2020-12-22 00:31:29',
            ),
            16 =>
            array (
                'id' => 17,
                'name' => 'Md Dalwar',
                'company' => 'Dalwar Enterprise',
                'address' => 'Mirpur 14, Eastern housing, Dhaka.',
                'email' => NULL,
                'phone' => '01819924645',
                'created_at' => '2020-12-22 00:33:57',
                'updated_at' => '2020-12-22 00:33:57',
            ),
            17 =>
            array (
                'id' => 18,
                'name' => 'Md Azizur Rahman',
                'company' => 'Tasnin Associate',
                'address' => 'Gausul azam super market, Nilkhet, Dhaka.',
                'email' => NULL,
                'phone' => '01775165911',
                'created_at' => '2020-12-22 00:36:06',
                'updated_at' => '2020-12-22 00:36:06',
            ),
            18 =>
            array (
                'id' => 19,
            'name' => 'N.S Auto T (Md hossain)',
                'company' => 'N.S Auto Traders',
                'address' => 'Motijheel, BS Bhabhan, Dhaka.',
                'email' => NULL,
                'phone' => '01749743053',
                'created_at' => '2020-12-22 00:38:10',
                'updated_at' => '2021-06-30 18:45:18',
            ),
            19 =>
            array (
                'id' => 20,
                'name' => 'Premiaflex Plastics Ltd',
                'company' => 'ACI',
                'address' => 'Tejgaon,Dhaka',
                'email' => NULL,
                'phone' => '+8878603',
                'created_at' => '2020-12-29 15:56:53',
                'updated_at' => '2020-12-29 15:56:53',
            ),
            20 =>
            array (
                'id' => 21,
                'name' => 'mst murshida khatun',
                'company' => 'vcl',
                'address' => 'manikgonj',
                'email' => 'visiontradeinternational22@gmail.com',
                'phone' => '01777660528',
                'created_at' => '2021-04-09 14:43:50',
                'updated_at' => '2021-04-09 14:43:50',
            ),
            21 =>
            array (
                'id' => 22,
            'name' => 'MOHI (M.M CORPORATION)',
                'company' => 'M.M CORPORATION',
            'address' => 'HELENA CENTER(3RD FLOOR)NEW ESKATON ROAD,DHAKA-1000(01711243318)',
                'email' => NULL,
                'phone' => '01711243318',
                'created_at' => '2021-06-21 17:29:47',
                'updated_at' => '2021-06-21 17:29:47',
            ),
            22 =>
            array (
                'id' => 23,
                'name' => 'SURAIYA MADAM',
                'company' => 'SURAIYA MADAM',
                'address' => 'DHAKA B.ST.I',
                'email' => NULL,
                'phone' => '020222',
                'created_at' => '2021-06-28 10:42:17',
                'updated_at' => '2021-06-28 10:42:17',
            ),
        ));


    }
}
