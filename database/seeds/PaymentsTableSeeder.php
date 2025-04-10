<?php

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('payments')->delete();

        \DB::table('payments')->insert(array (
            0 =>
            array (
                'id' => 1,
                'amount' => 28000.0,
                'supplier_id' => 2,
                'reference' => 'M.D sir',
                'payments_at' => '2020-12-07 16:27:32',
                'admin_id' => 13,
                'created_at' => '2020-12-07 16:27:32',
                'updated_at' => '2020-12-07 16:27:32',
            ),
            1 =>
            array (
                'id' => 2,
                'amount' => 50000.0,
                'supplier_id' => 3,
                'reference' => 'M.D sir',
                'payments_at' => '2020-12-07 17:26:13',
                'admin_id' => 13,
                'created_at' => '2020-12-07 17:26:13',
                'updated_at' => '2020-12-07 17:26:13',
            ),
            2 =>
            array (
                'id' => 3,
                'amount' => 8200.0,
                'supplier_id' => 4,
                'reference' => 'M.D sir',
                'payments_at' => '2020-12-12 13:22:20',
                'admin_id' => 13,
                'created_at' => '2020-12-12 13:22:20',
                'updated_at' => '2020-12-12 13:22:20',
            ),
            3 =>
            array (
                'id' => 4,
                'amount' => 7510.0,
                'supplier_id' => 5,
                'reference' => 'M.D sir',
                'payments_at' => '2020-12-12 13:33:46',
                'admin_id' => 13,
                'created_at' => '2020-12-12 13:33:46',
                'updated_at' => '2020-12-12 13:33:46',
            ),
            4 =>
            array (
                'id' => 5,
                'amount' => 11220.0,
                'supplier_id' => 6,
                'reference' => 'M.D sir',
                'payments_at' => '2020-12-12 13:40:03',
                'admin_id' => 13,
                'created_at' => '2020-12-12 13:40:03',
                'updated_at' => '2020-12-12 13:40:03',
            ),
            5 =>
            array (
                'id' => 6,
                'amount' => 36000.0,
                'supplier_id' => 8,
                'reference' => 'BCSIR Test',
                'payments_at' => '2020-12-12 14:03:07',
                'admin_id' => 13,
                'created_at' => '2020-12-12 14:03:07',
                'updated_at' => '2020-12-12 14:03:07',
            ),
            6 =>
            array (
                'id' => 7,
                'amount' => 200000.0,
                'supplier_id' => 19,
                'reference' => 'Online Ific Bank',
                'payments_at' => '2020-12-21 00:50:59',
                'admin_id' => 3,
                'created_at' => '2020-12-22 00:50:59',
                'updated_at' => '2020-12-22 00:50:59',
            ),
            7 =>
            array (
                'id' => 8,
                'amount' => 180000.0,
                'supplier_id' => 19,
                'reference' => 'M.D sir cash',
                'payments_at' => '2020-12-24 14:03:04',
                'admin_id' => 13,
                'created_at' => '2020-12-24 14:03:04',
                'updated_at' => '2020-12-24 14:03:04',
            ),
            8 =>
            array (
                'id' => 10,
                'amount' => 200000.0,
                'supplier_id' => 20,
                'reference' => 'MD sir',
                'payments_at' => '2020-12-29 15:57:48',
                'admin_id' => 13,
                'created_at' => '2020-12-29 15:57:48',
                'updated_at' => '2020-12-29 15:57:48',
            ),
            9 =>
            array (
                'id' => 11,
                'amount' => 1000.0,
                'supplier_id' => 18,
                'reference' => 'due now=17800',
                'payments_at' => '2021-02-04 11:51:46',
                'admin_id' => 13,
                'created_at' => '2021-02-04 11:51:46',
                'updated_at' => '2021-02-04 11:51:46',
            ),
            10 =>
            array (
                'id' => 12,
                'amount' => 100000.0,
                'supplier_id' => 19,
                'reference' => 'M.D sir cash',
                'payments_at' => '2021-01-03 13:46:42',
                'admin_id' => 13,
                'created_at' => '2021-02-04 13:46:42',
                'updated_at' => '2021-02-04 13:46:42',
            ),
            11 =>
            array (
                'id' => 13,
                'amount' => 200000.0,
                'supplier_id' => 19,
                'reference' => 'payment by plabon',
                'payments_at' => '2021-02-15 16:25:16',
                'admin_id' => 13,
                'created_at' => '2021-02-15 16:25:16',
                'updated_at' => '2021-02-15 16:25:16',
            ),
            12 =>
            array (
                'id' => 14,
                'amount' => 150000.0,
                'supplier_id' => 19,
                'reference' => 'payment by plabon',
                'payments_at' => '2021-02-10 16:41:36',
                'admin_id' => 13,
                'created_at' => '2021-02-15 16:41:36',
                'updated_at' => '2021-02-15 16:41:36',
            ),
            13 =>
            array (
                'id' => 15,
                'amount' => 302.0,
                'supplier_id' => 1,
                'reference' => '00',
                'payments_at' => '2021-02-15 16:52:52',
                'admin_id' => 13,
                'created_at' => '2021-02-15 16:44:50',
                'updated_at' => '2021-02-15 16:52:52',
            ),
            14 =>
            array (
                'id' => 16,
                'amount' => 200000.0,
                'supplier_id' => 19,
                'reference' => 'Ific bank',
                'payments_at' => '2021-05-30 12:03:44',
                'admin_id' => 13,
                'created_at' => '2021-05-31 12:03:44',
                'updated_at' => '2021-05-31 12:03:44',
            ),
            15 =>
            array (
                'id' => 17,
                'amount' => 10000.0,
                'supplier_id' => 17,
                'reference' => 'Cash',
                'payments_at' => '2021-06-03 18:07:27',
                'admin_id' => 13,
                'created_at' => '2021-06-03 18:07:27',
                'updated_at' => '2021-06-03 18:07:27',
            ),
            16 =>
            array (
                'id' => 18,
                'amount' => 224250.0,
                'supplier_id' => 8,
                'reference' => 'BCSIR PMNT BY MOHIN',
                'payments_at' => '2021-06-21 17:24:20',
                'admin_id' => 13,
                'created_at' => '2021-06-21 17:24:20',
                'updated_at' => '2021-06-21 17:24:20',
            ),
            17 =>
            array (
                'id' => 19,
                'amount' => 430000.0,
                'supplier_id' => 22,
                'reference' => 'DHAKA BANK BY MOHIN',
                'payments_at' => '2021-06-21 18:13:10',
                'admin_id' => 13,
                'created_at' => '2021-06-21 18:12:31',
                'updated_at' => '2021-06-21 18:13:10',
            ),
            18 =>
            array (
                'id' => 20,
                'amount' => 200000.0,
                'supplier_id' => 19,
                'reference' => 'N.S AUTO IFIC BANK',
                'payments_at' => '2021-06-21 18:18:32',
                'admin_id' => 13,
                'created_at' => '2021-06-21 18:18:32',
                'updated_at' => '2021-06-21 18:18:32',
            ),
            19 =>
            array (
                'id' => 21,
                'amount' => 200000.0,
                'supplier_id' => 19,
            'reference' => 'TO N.S AUTO(IFIC)',
                'payments_at' => '2021-06-22 14:33:05',
                'admin_id' => 13,
                'created_at' => '2021-06-22 14:33:05',
                'updated_at' => '2021-06-22 14:33:05',
            ),
            20 =>
            array (
                'id' => 22,
                'amount' => 100000.0,
                'supplier_id' => 19,
            'reference' => 'TO N.S AUTO(IFIC)',
                'payments_at' => '2021-06-22 14:34:39',
                'admin_id' => 13,
                'created_at' => '2021-06-22 14:34:39',
                'updated_at' => '2021-06-22 14:34:39',
            ),
            21 =>
            array (
                'id' => 23,
                'amount' => 70000.0,
                'supplier_id' => 22,
                'reference' => 'BANK ACC KHULNA BSTI',
                'payments_at' => '2021-06-21 10:37:33',
                'admin_id' => 13,
                'created_at' => '2021-06-28 10:35:07',
                'updated_at' => '2021-06-28 10:37:33',
            ),
            22 =>
            array (
                'id' => 24,
                'amount' => 20000.0,
                'supplier_id' => 22,
                'reference' => 'DHAKA BSTI  BANK ACC',
                'payments_at' => '2021-06-24 10:39:17',
                'admin_id' => 13,
                'created_at' => '2021-06-28 10:38:32',
                'updated_at' => '2021-06-28 10:39:17',
            ),
            23 =>
            array (
                'id' => 25,
                'amount' => 20000.0,
                'supplier_id' => 23,
                'reference' => 'DHAKA BSTI MAM BIKAS',
                'payments_at' => '2021-06-28 10:43:52',
                'admin_id' => 13,
                'created_at' => '2021-06-28 10:43:52',
                'updated_at' => '2021-06-28 10:43:52',
            ),
            24 =>
            array (
                'id' => 26,
                'amount' => 20000.0,
                'supplier_id' => 22,
                'reference' => 'BANK ACC KHULNA BSTI',
                'payments_at' => '2021-06-27 10:44:41',
                'admin_id' => 13,
                'created_at' => '2021-06-28 10:44:41',
                'updated_at' => '2021-06-28 10:44:41',
            ),
            25 =>
            array (
                'id' => 27,
                'amount' => 850000.0,
                'supplier_id' => 22,
                'reference' => 'TO MAHBUBUL HAQ IBBL',
                'payments_at' => '2021-06-30 18:30:59',
                'admin_id' => 13,
                'created_at' => '2021-06-30 18:30:59',
                'updated_at' => '2021-06-30 18:30:59',
            ),
            26 =>
            array (
                'id' => 28,
                'amount' => 300000.0,
                'supplier_id' => 19,
            'reference' => 'DEP TO N.SAUTO(IFIC)',
                'payments_at' => '2021-06-30 18:43:14',
                'admin_id' => 13,
                'created_at' => '2021-06-30 18:43:14',
                'updated_at' => '2021-06-30 18:43:14',
            ),
        ));


    }
}
