<?php

use Illuminate\Database\Seeder;

class DealsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('deals')->delete();

        \DB::table('deals')->insert(array (
            0 =>
            array (
                'id' => 1,
                'title' => 'Offer 1',
                'description' => 'Today  I got a message from daraz that "Your order are on its way" but nobody called me',
                'amount' => 50.0,
                'image' => 'offer-1-2020-06-17.png',
                'button_text' => 'SHOP NOW',
                'button_url' => '#',
                'bg_color' => '#f3f6f4',
                'button_color' => '#8fce00',
                'product' => 8,
                'status' => 0,
                'expired_at' => '2020-06-21 12:00:00',
                'created_at' => '2020-06-17 15:27:16',
                'updated_at' => '2020-06-22 19:28:47',
            ),
            1 =>
            array (
                'id' => 2,
                'title' => 'Deal one',
                'description' => 'New From Company',
                'amount' => 12.0,
                'image' => 'deal-one-2020-06-22.png',
                'button_text' => 'SHOP NOW',
                'button_url' => '#',
                'bg_color' => '#f3f6f4',
                'button_color' => '#3498db',
                'product' => 2,
                'status' => 0,
                'expired_at' => '2020-06-25 12:00:00',
                'created_at' => '2020-06-22 19:32:14',
                'updated_at' => '2020-06-22 19:32:14',
            ),
            2 =>
            array (
                'id' => 3,
                'title' => 'Hair Grow Hair Oil',
            'description' => 'য়ার গ্রো হেয়ার ওয়েল  অনেকগুলি ভেষজ   ও আয়ুর্বেদিক জরিবুটি উপাদানের সংমিশ্রণে  দারা প্রস্তুতকৃত যা ১) চুল পড়া রোধ করে  ২) নতুন চুল গজাতে সাহায্য করে   ৩) খুশকি দূর করে',
            'amount' => 200.0,
            'image' => 'hi-2020-07-04.png',
            'button_text' => 'SHOP NOW',
            'button_url' => '#',
            'bg_color' => 'white',
            'button_color' => '#3498db',
            'product' => 24,
            'status' => 0,
            'expired_at' => '2020-07-30 00:00:00',
            'created_at' => '2020-07-02 22:47:31',
            'updated_at' => '2020-07-26 14:10:45',
        ),
        3 =>
        array (
            'id' => 4,
            'title' => 'Safe Mask Only 68/- Tk per Box',
            'description' => 'Offer Limited Time Only',
            'amount' => 68.0,
            'image' => 'test-deal-2020-07-31.jpg',
            'button_text' => 'SHOP NOW',
            'button_url' => '#',
            'bg_color' => 'white',
            'button_color' => '#3498db',
            'product' => 20,
            'status' => 0,
            'expired_at' => '2020-08-07 00:00:00',
            'created_at' => '2020-07-31 17:18:32',
            'updated_at' => '2020-07-31 17:27:39',
        ),
        4 =>
        array (
            'id' => 5,
            'title' => 'Glycolite Facewash এখন মাত্র ৩৮৫ টাকা',
            'description' => 'এতে আছে গ্লাইকোলিক এসিড যা ডেড স্কিন সেল গুলি  রিপেয়ার করে স্যালিসিলিক এসিড আপানার স্কিন পোরস গুলি পরিষ্কার  করে এছাড়াও আছে ল্যাকটিক এসিড যা ত্বকের উজ্জলতা ফিরিয়ে আনে',
            'amount' => 385.0,
            'image' => 'glycolite-facewash-ekhn-matr-385-taka-2020-11-22.jpg',
            'button_text' => 'Order Now',
            'button_url' => 'https://visionmartbd.com/product/56',
            'bg_color' => 'white',
            'button_color' => '#8fce00',
            'product' => 56,
            'status' => 0,
            'expired_at' => '2020-11-30 12:00:00',
            'created_at' => '2020-11-20 08:16:00',
            'updated_at' => '2020-11-22 08:00:48',
        ),
        5 =>
        array (
            'id' => 6,
            'title' => 'GLOWSAP Vitamin C Serum is 59 tk off',
            'description' => 'GLOWSAP  এখন ৫৯ টাকা কমে মাত্র ৮৪০ টাকা সাথে ১০% ডিস্কাউন্ট তো আছেই তো আর দেরি না করে SHOP NOW বাটনে ক্লিক করে অর্ডার করে ফেলুন',
            'amount' => 840.0,
            'image' => 'glowsap-vitamin-c-serum-is-59-tk-off-2020-12-22.jpg',
            'button_text' => 'SHOP NOW',
            'button_url' => '#',
            'bg_color' => 'white',
            'button_color' => '#8fce00',
            'product' => 191,
            'status' => 0,
            'expired_at' => '2020-12-28 12:00:00',
            'created_at' => '2020-12-22 17:18:42',
            'updated_at' => '2020-12-22 17:18:42',
        ),
        6 =>
        array (
            'id' => 7,
            'title' => 'Glowsap Spcial Customer Discount 199 tk',
            'description' => 'Customer Special Discount 199 tk',
            'amount' => 700.0,
            'image' => 'glowsap-spcial-customer-discount-199-tk-2020-12-30.jpg',
            'button_text' => 'SHOP NOW',
            'button_url' => '#',
            'bg_color' => '#dddddd',
            'button_color' => '#8fce00',
            'product' => 191,
            'status' => 0,
            'expired_at' => '2020-12-31 23:59:00',
            'created_at' => '2020-12-30 17:24:26',
            'updated_at' => '2020-12-30 17:24:26',
        ),
        7 =>
        array (
            'id' => 8,
            'title' => '30 টাকা ছাড়',
            'description' => 'Cloazc Facewash Gel এ ৩০ টাকা ছাড় অফার টি নিতে SHOP NOW বাটনে ক্লিক করুন',
            'amount' => 350.0,
            'image' => '30-taka-chad-2021-01-06.jpg',
            'button_text' => 'SHOP NOW',
            'button_url' => '#',
            'bg_color' => 'white',
            'button_color' => '#8fce00',
            'product' => 59,
            'status' => 0,
            'expired_at' => '2021-01-07 23:59:00',
            'created_at' => '2021-01-06 18:43:22',
            'updated_at' => '2021-01-06 18:44:23',
        ),
    ));


    }
}
