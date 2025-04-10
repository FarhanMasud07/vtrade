<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('companies')->delete();

        \DB::table('companies')->insert(array (
            0 =>
            array (
                'id' => 1,
                'company_name' => 'Vision Trade International',
                'address' => '26/1, 26/2 Dr. Kudrot-E-Khuda Road, Eastern Mollika Shopping Complex, Elephant Road, Dhaka-1205.',
                'email' => 'visioncosmetics82@gmail.com',
                'phone' => '01958082919',
                'bin' => '000466013-0201',
                'social' => '{"facebook":["http:\\/\\/www.facebook.com\\/visionmartbd","1"],"twitter":["#","1"],"pinterest":["#","1"],"linkedin":["#","1"]}',
                'logo' => 'vision-trade-international_logo_19_2021-11-14.png',
                'favicon' => 'vision-trade-international_favicon_9_2021-10-08.png',
                'og_image' => 'vision-trade-international_og_image_23_2021-10-08.png',
                'tagline' => 'Experience the difference.',
                'short_description' => 'we created a brand concept consisting of both skin & beauty care products &  utilizing multiple channels of distribution nationally. The company started with the vision to serve the clients with the best quality products at the best competitive prices. To achieve this we have a management team that consists of young, dynamic and enthusiastic persons as well as experienced persons with a great experience in the field of cosmetics. The core group consists of highly skilled personnel.',
                'map_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.247858915142!2d90.38346211452391!3d23.738539184595144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b9295263eb59%3A0x64f7bc58ad273d7a!2sVision%20Mart!5e0!3m2!1sen!2sbd!4v1604025427508!5m2!1sen!2sbd"  height="400" frameborder="0" style="border:0;"  allowfullscreen="false" aria-hidden="true" tabindex="0"></iframe>',
                'created_at' => '2020-06-12 15:44:55',
                'updated_at' => '2021-11-14 14:52:45',
            ),
        ));


    }
}
