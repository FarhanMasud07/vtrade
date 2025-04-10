<?php

use Illuminate\Database\Seeder;

class SupplierduesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('supplierdues')->delete();

        \DB::table('supplierdues')->insert(array (
            0 =>
            array (
                'id' => 1,
                'amount' => 1136390.0,
                'supplier_id' => 19,
                'reference' => 'pre. due',
                'admin_id' => 3,
                'due_at' => '2020-12-22 00:40:18',
                'created_at' => '2020-12-22 00:40:18',
                'updated_at' => '2020-12-22 00:40:18',
            ),
            1 =>
            array (
                'id' => 2,
                'amount' => 457500.0,
                'supplier_id' => 19,
                'reference' => 'Rv by pomd',
                'admin_id' => 3,
                'due_at' => '2020-12-22 00:49:48',
                'created_at' => '2020-12-22 00:49:48',
                'updated_at' => '2020-12-22 00:49:48',
            ),
        ));


    }
}
