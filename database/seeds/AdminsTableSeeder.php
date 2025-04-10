<?php


use Illuminate\Database\Seeder;


class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('admins')->delete();

        \DB::table('admins')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Md Shajib Azher',
                'adminname' => 'admin',
                'email' => 'mdshajibazher@gmail.com',
                'phone' => '01700817934',
                'image' => 'md-shajib-azher-2020-06-21.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$9niCJ4gKzOqheETc1RCB.OrIk7ayFsgDvExP0sKWtEt.oPwXOeFQq',
                'signature' => NULL,
                'remember_token' => 'SrHSfyL3TIFJbqwcqIY6uiH6MdgpnxVQCLevECnEUAVeoWCi3JXPjyjmYSOG',
                'status' => 1,
                'created_at' => '2020-08-09 00:00:00',
                'updated_at' => '2020-11-17 17:13:17',
            ),
            1 =>
            array (
                'id' => 3,
                'name' => 'Md Abdus Salam',
                'adminname' => 'salam',
                'email' => 'visioncosmetics82@gmail.com',
                'phone' => '01736402322',
                'image' => 'md-abdus-salam-2020-08-18.jpg',
                'email_verified_at' => NULL,
                'password' => '$2y$10$DbsjNFy7QbQDZr8a.oy6d.mGLgHCMPebM7L/3sQWCYirw77rpuxgi',
                'signature' => 'md-abdus-salam-2020-08-16.png',
                'remember_token' => 'pKf6GUMSG5JYu8N2yyZ1XsiNPhFMluFVEgwD7szVg7WJ5QZTHUF5N9T9QSBK',
                'status' => 1,
                'created_at' => '2020-08-09 00:00:00',
                'updated_at' => '2020-08-18 12:01:51',
            ),
            2 =>
            array (
                'id' => 5,
                'name' => 'Fardin',
                'adminname' => 'fardin',
                'email' => 'fardinlabib2136@gmail.com',
                'phone' => '+8801891970962',
                'image' => 'fardin-2020-12-29.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$F5CM.jnKLdSEYtxHI6sBveTlHUY8URIVJIdU/s7zRQb9ruAdDHZdu',
                'signature' => 'fardin-2020-12-29.jpg',
                'remember_token' => NULL,
                'status' => 1,
                'created_at' => '2020-08-16 23:55:26',
                'updated_at' => '2020-12-29 12:10:45',
            ),
            3 =>
            array (
                'id' => 6,
                'name' => 'Murshida poly',
                'adminname' => 'murshida-poly',
                'email' => 'abdussalam.vcl@gmail.com',
                'phone' => '01777660528',
                'image' => 'murshida-poly-2020-08-18.jpg',
                'email_verified_at' => NULL,
                'password' => '$2y$10$DbsjNFy7QbQDZr8a.oy6d.mGLgHCMPebM7L/3sQWCYirw77rpuxgi',
                'signature' => 'murshida-poly-2020-08-17.png',
                'remember_token' => 'zLnZ3Dmg4F8mD0crfpCtGbdJJiuoS0A0sRpldWjEtzGmLcsyEhvVKNUOC0P9',
                'status' => 1,
                'created_at' => '2020-08-17 18:38:55',
                'updated_at' => '2020-08-18 11:54:12',
            ),
            4 =>
            array (
                'id' => 7,
                'name' => 'Bithi',
                'adminname' => 'bithi',
                'email' => 'malakerbithi51@gmail.com',
                'phone' => '01832666351',
                'image' => 'default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iTg92T8k8OfNzeya4IJfmO77YSnjo0jercjFGUZ42oHpqozpR5dlG',
                'signature' => NULL,
                'remember_token' => 'zPH5SH1s9pcAKRcj5vU1PV68Tu1SbXcXEN7Vj8LCMXch5M8QzOVLTtw7n2Mc',
                'status' => 1,
                'created_at' => '2020-08-18 18:43:16',
                'updated_at' => '2020-08-18 18:43:16',
            ),
            5 =>
            array (
                'id' => 8,
                'name' => 'Md habibur Rahman',
                'adminname' => 'md-habibur-rahman',
                'email' => 'visiontradebd09@gmail.com',
                'phone' => '01724136687',
                'image' => 'default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$0mkyfDTdyYOEvwr9th.z3OYHcz0M/oKuvykO/4JUkcEQbIFIaFSs6',
                'signature' => NULL,
                'remember_token' => 'H88soPeS08aSgVoBhm3zakHpreJiucsCDcQzpNOddbEvLtNLyhZhIl5hsWuy',
                'status' => 1,
                'created_at' => '2020-08-22 21:29:27',
                'updated_at' => '2022-03-09 22:09:24',
            ),
            6 =>
            array (
                'id' => 9,
                'name' => 'Md.  Anondo',
                'adminname' => 'md-samsul-arefin-abir',
                'email' => 'mdsaabir2606@gmail.com',
                'phone' => '01958454158',
                'image' => 'md-samsul-arefin-abir-2020-09-28.jpg',
                'email_verified_at' => NULL,
                'password' => '$2y$10$9niCJ4gKzOqheETc1RCB.OrIk7ayFsgDvExP0sKWtEt.oPwXOeFQq',
                'signature' => NULL,
                'remember_token' => NULL,
                'status' => 0,
                'created_at' => '2020-09-21 19:28:29',
                'updated_at' => '2020-11-17 17:12:21',
            ),
            7 =>
            array (
                'id' => 10,
                'name' => 'Md asaf ud daula  plabon',
                'adminname' => 'md-asaf-ud-daula-plabon',
                'email' => 'asafplabon@gmail.com',
                'phone' => '01917945519',
                'image' => 'default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$SMnjcKDm813x3XvllVAYROSkyFlyvALJaAcvix2t1HeM8OJUPnuay',
                'signature' => NULL,
                'remember_token' => NULL,
                'status' => 0,
                'created_at' => '2020-10-01 10:49:03',
                'updated_at' => '2021-06-10 07:12:27',
            ),
            8 =>
            array (
                'id' => 11,
                'name' => 'Md Sohel',
                'adminname' => 'md-sohel',
                'email' => 'sohel@gmail.com',
                'phone' => '01791290770',
                'image' => 'default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$mX2dt8W.xQR2GrVRcAWMWus.jPZujHqYdUa7f6AxFltcAzp9XgVhu',
                'signature' => NULL,
                'remember_token' => NULL,
                'status' => 0,
                'created_at' => '2020-10-12 12:31:04',
                'updated_at' => '2020-11-13 22:53:46',
            ),
            9 =>
            array (
                'id' => 12,
                'name' => 'Md Abdul Mabud',
                'adminname' => 'md-abdul-mabud',
                'email' => 'marziatrading.bd2018@gmail.com',
                'phone' => '01714932679',
                'image' => 'default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$QtcUicCAWDYIpM742MxeZOO15F/WoaaXQV4dIMGI/nRhb9iqmjgvC',
                'signature' => NULL,
                'remember_token' => 'seqDhdmL4rbr8V9eQnoCbaXR6QbDVVuCB92nuH7oSlDjTnhA30wCpidOHQEx',
                'status' => 1,
                'created_at' => '2020-11-23 18:32:43',
                'updated_at' => '2020-11-23 19:16:39',
            ),
            10 =>
            array (
                'id' => 13,
                'name' => 'Mohin U Hazari',
                'adminname' => 'farjana-hossain',
                'email' => 'muhazari01@gmail.com',
                'phone' => '01850074574',
                'image' => 'default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$NkwWufXBizn7FngGkFdF0.IBzDBO1l9z16DioqwQRQmayEjI6SrIW',
                'signature' => NULL,
                'remember_token' => NULL,
                'status' => 0,
                'created_at' => '2020-12-01 11:17:57',
                'updated_at' => '2021-07-16 17:40:39',
            ),
            11 =>
            array (
                'id' => 14,
                'name' => 'Swapna',
                'adminname' => 'swapna',
                'email' => 'yesminswapna96@gmail.com',
                'phone' => '01958082927',
                'image' => 'default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$6.frPthBt0tKMm1ddPYRgezaAe67uUUHMu0VHTmwzW/olOYVml1oW',
                'signature' => NULL,
                'remember_token' => NULL,
                'status' => 0,
                'created_at' => '2021-01-28 10:53:18',
                'updated_at' => '2021-07-16 17:39:59',
            ),
            12 =>
            array (
                'id' => 15,
                'name' => 'Biplob Sarker',
                'adminname' => 'biplob-sarker',
                'email' => 'biplobsarker211@gmail.com',
                'phone' => '01943168298',
                'image' => 'default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ml0zDdghReCetR8WpL.qROlTqcbhOKXHRBs8vvEK1nkMHQvhHPyU6',
                'signature' => NULL,
                'remember_token' => NULL,
                'status' => 0,
                'created_at' => '2021-08-29 17:17:25',
                'updated_at' => '2022-02-23 17:30:37',
            ),
            13 =>
            array (
                'id' => 16,
                'name' => 'JOly',
                'adminname' => 'joly',
                'email' => 'jamilabopasa@gmail.com',
                'phone' => '01754071833',
                'image' => 'default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$KyRU.QqQtUcDDRWuajrKkuKzk4phHULgTEOmU78Og68BASFBO6qAC',
                'signature' => NULL,
                'remember_token' => NULL,
                'status' => 0,
                'created_at' => '2021-09-21 12:54:42',
                'updated_at' => '2021-09-23 13:14:03',
            ),
            14 =>
            array (
                'id' => 17,
                'name' => 'Md Zillur Rahman',
                'adminname' => 'md-zillur-rahman',
                'email' => 'zillurrahmanaz344@gmail.com',
                'phone' => '01778284863',
                'image' => 'md-zillur-rahman-2021-10-18.jpg',
                'email_verified_at' => NULL,
                'password' => '$2y$10$wXQxCLWFV/lUWYB1qo/pV.PE8i8kAHYJ7lq4hZIXa4.eIvOu/bRaO',
                'signature' => NULL,
                'remember_token' => NULL,
                'status' => 1,
                'created_at' => '2021-10-04 12:12:03',
                'updated_at' => '2021-10-18 16:34:21',
            ),
            15 =>
            array (
                'id' => 18,
                'name' => 'Md Jahidul Islam',
                'adminname' => 'md-jahidul-islam',
                'email' => 'jahid0188167@gmail.com',
                'phone' => '01824170221',
                'image' => 'default.png',
                'email_verified_at' => NULL,
                'password' => '$2y$10$3mbdDGLTzuvBgSEKNVToW.8zf9m7/Hwgs3OqB20gD2IF7H2z0Yqgy',
                'signature' => NULL,
                'remember_token' => NULL,
                'status' => 1,
                'created_at' => '2022-02-12 13:25:14',
                'updated_at' => '2022-02-12 13:25:14',
            ),
        ));


    }
}
