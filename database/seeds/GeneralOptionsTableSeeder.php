<?php

use Illuminate\Database\Seeder;

class GeneralOptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $general_options = array(
            array('id' => '1','options' => '{"inv_diff_invoice_heading":0,"inv_invoice_heading":"Vision Trade International","auto_signature_inv":"1","inv_invoice_email":"visioncosmetics82@gmail.com","inv_invoice_address":"26\\/1, 26\\/2 Dr. Kudrot-E-Khuda Road, Eastern Mollika Shopping Complex, Elephant Road, Dhaka-1205.","inv_invoice_logo":"1634093171-2021-10-13.png","inv_invoice_phone":"+88029634781","cust_sales_invoice_includes_product":"1","cust_return_invoice_includes_product":"1","max_product_character_allowed":"360","sms_delay_in_days":"5","admin_sales_invoice_created_notify":0,"admin_list_sales_invoice_created_notify":["1"],"admin_sales_invoice_edited_notify":0,"admin_list_sales_invoice_edited_notify":["1"],"admin_sales_invoice_canceled_notify":0,"admin_list_sales_invoice_canceled_notify":["1"],"admin_return_invoice_created_notify":0,"admin_list_return_invoice_created_notify":["1"],"admin_return_invoice_edited_notify":0,"admin_list_return_invoice_edited_notify":["1"],"admin_return_invoice_canceled_notify":0,"admin_list_return_invoice_canceled_notify":["1"],"admin_cash_edited_notify":0,"customer_sales_invoice_created_notify":0,"customer_sales_invoice_edited_notify":0,"customer_sales_invoice_delivered_notify":0,"customer_sales_invoice_canceled_notify":0,"customer_return_invoice_created_notify":0,"customer_return_invoice_edited_notify":0,"customer_return_invoice_canceled_notify":0,"customer_cash_approval_notify":0,"d_agent_sales_invoice_created_notify":0,"d_agent_sales_invoice_edited_notify":0,"d_agent_sales_invoice_includes_product":0,"d_agent_list_sales_invoice_notify":["1"],"admin_email_sales_invoice_created":0,"admin_list_email_sales_invoice_created":["3"],"admin_email_sales_invoice_edited":0,"admin_list_email_sales_invoice_edited":["3"],"admin_email_return_invoice_created":0,"admin_list_email_return_invoice_created":["3","6"],"admin_email_return_invoice_edited":0,"admin_list_email_return_invoice_edited":["3","6"]}','created_at' => NULL,'updated_at' => '2022-05-07 13:31:34')
        );

        \DB::table('general_options')->delete();
        \DB::table('general_options')->insert($general_options);


    }
}
