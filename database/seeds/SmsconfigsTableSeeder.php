<?php

use Illuminate\Database\Seeder;

class SmsconfigsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('smsconfigs')->delete();

        \DB::table('smsconfigs')->insert(array (
            0 =>
            array (
                'id' => 2,
                'api_url' => 'http://66.45.237.70/api.php',
                'username' => 'shajibazher',
                'password' => 'UtUs6B8WVqjmm72',
                'delivery_agent_number_csv' => '01724136687',
                'boss_notify_number_csv' => '01736402322',
                'created_at' => '2021-02-19 21:22:46',
                'updated_at' => '2021-02-19 21:22:46',
            ),
        ));


    }
}
