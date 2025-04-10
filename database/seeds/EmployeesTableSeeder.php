<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('employees')->delete();

        \DB::table('employees')->insert(array (
            0 =>
            array (
                'id' => 2,
                'name' => 'Md Abdur Rauf',
                'email' => NULL,
                'phone' => '01958082920,01632509437',
                'address' => 'Dhaka',
                'joining_date' => '2017-08-01 00:00:00',
                'salary' => '15000',
                'nid' => '19921914071000075',
                'employee_type_id' => 6,
                'assigned_customers' => NULL,
                'email_verified_at' => NULL,
                'remember_token' => '7XmyyrPrWlY20BExvmPnUIsPysdtV1wDei2M0FD0fX69ovVXf49syEu6NgvD',
                'deleted_at' => NULL,
                'created_at' => '2020-08-06 20:37:46',
                'updated_at' => '2021-01-28 11:39:41',
            ),
            1 =>
            array (
                'id' => 3,
                'name' => 'Fardin Labib',
                'email' => 'fardinlabib2136@gmail.com',
                'phone' => '+8801958454154',
                'address' => 'Elephant Road, Dhaka, Bangladesh',
                'joining_date' => '2020-12-27 00:00:00',
                'salary' => '14000',
                'nid' => NULL,
                'employee_type_id' => 3,
                'assigned_customers' => NULL,
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-08-16 23:54:02',
                'updated_at' => '2020-12-29 11:54:45',
            ),
            2 =>
            array (
                'id' => 4,
                'name' => 'Md Shajib Ahmed',
                'email' => NULL,
                'phone' => '01958082916,01881043655',
                'address' => 'Vill: Macimpur, PO:  Murapra PO: Rupgonj District: Narayongonj',
                'joining_date' => '2021-01-01 00:00:00',
                'salary' => '20000',
                'nid' => '2696403593428',
                'employee_type_id' => 5,
                'assigned_customers' => NULL,
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-28 11:20:17',
                'updated_at' => '2021-01-28 11:31:55',
            ),
            3 =>
            array (
                'id' => 5,
                'name' => 'Md Rejaul Korim',
                'email' => 'mdrejaulkarim519@gmail.com',
                'phone' => '01828112797',
                'address' => 'Present Addrss:
House #602, Road #1/2,Shewrapara,Mirpur,Dhaka
Permanent Addrss:
Vill: Posimdebu PO: Pirgacha PS: Pirgacha, Dist: Rangpur',
                'joining_date' => '2020-10-17 00:00:00',
                'salary' => '20000',
                'nid' => 'BC: 1979851738500063',
                'employee_type_id' => 5,
                'assigned_customers' => NULL,
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-28 11:28:49',
                'updated_at' => '2021-01-28 11:28:49',
            ),
            4 =>
            array (
                'id' => 6,
                'name' => 'Abdul Al Mamun',
                'email' => NULL,
                'phone' => '01958082921,01634208696',
                'address' => 'Vill: Bagur P.O: Chandina P.S: Debidwar District: Comilla',
                'joining_date' => '2020-10-13 00:00:00',
                'salary' => '8500',
                'nid' => NULL,
                'employee_type_id' => 4,
                'assigned_customers' => NULL,
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-28 11:46:17',
                'updated_at' => '2021-01-28 11:46:17',
            ),
            5 =>
            array (
                'id' => 7,
                'name' => 'Md Josim Uddin',
                'email' => 'jibon371533@gmail.com',
                'phone' => '01958082922,01550039985',
                'address' => 'Vill: Gogaht P.O: Kamargonj, P.S: Gaibandha, Dist: Gaibandha',
                'joining_date' => '2020-06-01 00:00:00',
                'salary' => '8500',
                'nid' => 'BC: 19993212401001570',
                'employee_type_id' => 4,
                'assigned_customers' => NULL,
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-28 11:52:23',
                'updated_at' => '2021-01-28 11:52:23',
            ),
            6 =>
            array (
                'id' => 8,
                'name' => 'Md Anisur Rahman',
                'email' => NULL,
                'phone' => '01958082923,01916000323',
                'address' => 'Vill: Bamutia PO: Mochail P.S: Chandina Dist: Comilla',
                'joining_date' => '2020-12-23 00:00:00',
                'salary' => '8500',
                'nid' => NULL,
                'employee_type_id' => 4,
                'assigned_customers' => NULL,
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-28 12:04:21',
                'updated_at' => '2021-01-28 12:04:21',
            ),
            7 =>
            array (
                'id' => 9,
                'name' => 'Md Rubel',
                'email' => NULL,
                'phone' => '01958082913,01718928640',
                'address' => '21/Ga,Distilary Road,Gandaria,Dhaka',
                'joining_date' => '2021-01-01 00:00:00',
                'salary' => '15000',
                'nid' => '7915834321966',
                'employee_type_id' => 6,
                'assigned_customers' => NULL,
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-28 12:23:23',
                'updated_at' => '2021-01-28 12:23:23',
            ),
            8 =>
            array (
                'id' => 10,
                'name' => 'Md Shimul Hossain',
                'email' => NULL,
                'phone' => '01958082928,01306066609',
                'address' => 'Vill: Rajapur, PO: boluhor, Upazilla: Kotchadpur District: Jhenaidah',
                'joining_date' => '2020-09-01 00:00:00',
                'salary' => '8500',
                'nid' => 'BC: 20024414281108397',
                'employee_type_id' => 4,
                'assigned_customers' => NULL,
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-28 12:44:50',
                'updated_at' => '2021-01-28 12:44:50',
            ),
            9 =>
            array (
                'id' => 11,
                'name' => 'Md Emon',
                'email' => NULL,
                'phone' => '01958082915,01992775354',
                'address' => 'Vill: pergendaria P.S: South Keranigonj, PO: Pergendaria, Dist: Dhaka',
                'joining_date' => '2020-11-17 00:00:00',
                'salary' => '8000',
                'nid' => 'BC: 20022613869220860',
                'employee_type_id' => 4,
                'assigned_customers' => NULL,
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-28 12:51:57',
                'updated_at' => '2021-01-28 12:51:57',
            ),
            10 =>
            array (
                'id' => 12,
                'name' => 'Md Jabed Hossain',
                'email' => NULL,
                'phone' => '01958082925,01775570789',
                'address' => 'Vill: Latifpur, P.O: Jomidar Hat, P.S: Begumgonj Dist: Noakhali',
                'joining_date' => '2021-01-01 00:00:00',
                'salary' => '8500',
                'nid' => '4662331315',
                'employee_type_id' => 4,
                'assigned_customers' => NULL,
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-28 12:58:31',
                'updated_at' => '2021-01-28 12:58:31',
            ),
            11 =>
            array (
                'id' => 13,
                'name' => 'Md Syed Morsalin',
                'email' => NULL,
                'phone' => '01958082918,01893755477',
                'address' => 'Vill: Barimoolish, P.O: Baranagar, P.S: Sonargaon Dist: Narayongonj',
                'joining_date' => '2021-01-01 00:00:00',
                'salary' => '8500',
                'nid' => 'BC: 19996710751022451',
                'employee_type_id' => 4,
                'assigned_customers' => NULL,
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-28 13:10:59',
                'updated_at' => '2021-01-28 13:10:59',
            ),
            12 =>
            array (
                'id' => 14,
                'name' => 'Md Uzzal',
                'email' => NULL,
                'phone' => '01958082926,01310095065',
                'address' => 'C/O Doctor Para, P.O: Feni, P.S: Feni Sadar, Dist: Feni',
                'joining_date' => '2020-12-01 00:00:00',
                'salary' => '8500',
                'nid' => '8251828052',
                'employee_type_id' => 4,
                'assigned_customers' => NULL,
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-28 13:17:20',
                'updated_at' => '2021-01-28 13:17:20',
            ),
            13 =>
            array (
                'id' => 15,
                'name' => 'Md Soykat Islam Sawon',
                'email' => NULL,
                'phone' => '01958082929',
                'address' => 'Vill: Baroballdia, P.O: Khidir UP: Gaibandha Zilla: Gaibandha',
                'joining_date' => '2021-01-18 00:00:00',
                'salary' => '8000',
                'nid' => '9154606579',
                'employee_type_id' => 4,
                'assigned_customers' => NULL,
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-28 13:23:03',
                'updated_at' => '2021-01-28 13:23:03',
            ),
            14 =>
            array (
                'id' => 16,
                'name' => 'Md Mainul Islam',
                'email' => NULL,
                'phone' => '01958082914',
                'address' => 'Vill: Charkaligonj, P.O: Shuvaddya, P.S: South Keranigonj, Dist: Dhaka-1310',
                'joining_date' => '2021-01-01 00:00:00',
                'salary' => '8500',
                'nid' => 'BC: 19957918776112149',
                'employee_type_id' => 4,
                'assigned_customers' => NULL,
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2021-01-28 13:29:49',
                'updated_at' => '2021-01-28 13:29:49',
            ),
        ));


    }
}
