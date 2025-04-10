<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/sms_test',function(){
    return sendSMS("Test SMS","01700817934");
});

Route::get('/','Auth\AdminLoginController@adminLogin')->name('frontend.home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/login', 'Auth\AdminLoginController@adminLogin')->name('admin.login');
Route::post('admin/login', 'Auth\AdminLoginController@adminLoginSubmit')->name('admin.loginsubmit');


//Access For All Admin

Route::group(['prefix'=> 'admin','middleware' => ['auth:admin']], function(){
    Route::post('/get_stock_by_single_product/{product_id}','StockController@getStockBySingleProduct');
    Route::get('sms_logs','smsLogController@index')->name('sms_logs.index');
    Route::get('sms_logs/{id}','smsLogController@show')->name('sms_logs.show');
    Route::get('growth_charts','ChartController@index')->name('charts.index');
    Route::post('growth_charts/show','ChartController@show')->name('charts.show');
    Route::post('growth_charts','ChartController@getChartData')->name('charts.getdata');

    Route::resource('posts','PostController');

    Route::resource('admininfo','adminController');
    Route::post('changeloginstatus/{id}','adminController@changeLoginStatus')->name('admin.changeloginstatus');

    Route::resource('rp/roles','RoleController');
    Route::resource('rp/permissions','RoleController');

    Route::get('inventory/dashboard', 'adminController@inventorydashboard')->name('admin.inventorydashboard');
    Route::get('logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');
    Route::get('action/changepassword','adminController@changepassword')->name('admin.changepassword');
    Route::put('action/changepassword/update','adminController@passUpdate')->name('admin.passupdate');
    Route::get('myaccount/profile','adminController@profile')->name('admin.profile');
    Route::get('myaccount/profile/edit','adminController@editprofile')->name('admin.editprofile');
    Route::put('myaccount/profile/update','adminController@updateprofile')->name('admin.updateprofile');


    Route::get('stock', 'StockController@index')->name('stock.index');
    Route::post('stock/export', 'StockController@export')->name('stock.export');
    Route::get('get_product_with_stock','StockController@getProductWithStock');
    Route::get('search_product_with_stock/{queryfield}/{query}','StockController@searchProductWithStock');
    //Stock Adjustment
    Route::post('store_stock_adjustment','StockController@StoreStockAdjustment');
    Route::get('get_stock_history/{id}','StockController@getProductStockHistory');
    Route::post('update_adjust/{id}','StockController@updateAdjust');
    //stock hide
    Route::post('hide_from_stock/{product_id}','StockController@hideFromStock');
    Route::post('restore_from_stock/{product_id}','StockController@restoreFromStock');
    Route::get('get_stock_hidden_items','StockController@getHiddenItems');

    Route::resource('expense','ExpenseController');
    Route::get('expensecatlist','ExpenseController@catlist')->name('expensecatlist');
    Route::resource('expensecategories','ExpenseCategoryController');

    Route::get('last10expense','ExpenseController@last10')->name('expense.last10');
    Route::post('expense/datewise','ExpenseController@datewise')->name('expense.datewise');
    Route::get('expense/datewise/{start}/{end}','ExpenseController@datewiseGetMethod')->name('expense.datewisegetmethod');

    Route::get('inventory/dashboard/viewsales/{id}', 'SaleController@show')->name('viewsales.show');
    Route::post('pos/sale/delivery/{id}', 'SaleController@delivery')->name('sale.delivery');
    Route::post('/send_mail_notifications','MailNotificationController@dispatchNotificationMail')->name('notification.mail');

    //Report Related Route
    Route::get('report/marketingreport', 'ReportController@MarketingReport')->name('report.marketingreport');
    Route::post('report/marketingreport', 'ReportController@ShowMarketingReport')->name('report.showmarketingreport');
    Route::resource('manager/assigncustomers', 'AssignCustomerController');


    Route::get('report/date_wise_product', 'StockController@dateWiseProduct')->name('report.date_wise_product');
    Route::post('report/date_wise_product', 'StockController@showDateWiseProduct')->name('report.show_date_wise_product');
    Route::get('report/date_wise_product/export', 'StockController@exportDateWiseProduct')->name('report.export_date_wise_product');
    Route::post('report/date_wise_product/generate_chart', 'StockController@generateProductChartData')->name('report.generate_chart');
    Route::get('report/date_wise_product/{id}', 'StockController@productDetails')->name('report.product_details');


    Route::get('report/pos/salesreport', 'ReportController@SalesReport')->name('report.possalesreport');
    Route::post('report/pos/salesreport', 'ReportController@SalesReportResult')->name('report.possalesresult');
    Route::post('report/pos/salesreport/pdf', 'ReportController@pdfSalesReport')->name('report.pdfpossalesresult');

    Route::get('report/pos/sales_details_report', 'ReportController@SalesDetailsReport')->name('report.sale_details');
    Route::post('report/pos/sales_details_report', 'ReportController@SalesDetailsReportResult')->name('report.sale_details_result');
    Route::post('report/pos/export_sales_details_report', 'ReportController@pdfSalesDetailsReport')->name('report.export_sale_details');

    Route::get('report/pos/deliveryreport', 'ReportController@DeliveryReport')->name('report.posdeliveryreport');
    Route::post('report/pos/deliveryreport', 'ReportController@ShowDeliveryReport')->name('report.posdeliveryresult');
    Route::post('report/pos/deliveryreport/pdf', 'ReportController@pdfDeliveryReport')->name('report.pdfposdeliveryresult');

    Route::get('report/supplierdue', 'ReportController@supplierdue')->name('report.supplierdue');
    Route::post('report/supplierdue', 'ReportController@showsupplierdue')->name('report.showsupplierdue');
    Route::post('report/supplierdue/pdf', 'ReportController@pdfsupplierdue')->name('report.pdfsupplierdue');


    Route::get('report/pos/duereport/', 'ReportController@InvDueReport')->name('report.duereport');
    Route::post('report/pos/duereport/result', 'ReportController@InvDueReportResult')->name('report.duereportresult');
    Route::post('report/pos/duereport/pdf', 'ReportController@pdfInvDueReportResult')->name('report.pdfduereportresult');



    Route::get('report/stockreport', 'StockController@stockreport')->name('stockreport.report');
    Route::post('report/stockreport', 'StockController@stockreportshow')->name('stockreport.show');
    Route::post('report/stockreport/pdf', 'StockController@stockreportpdf')->name('stockreport.pdf');

    Route::get('report/expensereport', 'ReportController@expensereport')->name('expensereport.index');
    Route::post('report/expensereport/pdf', 'ReportController@pdfexpensereport')->name('expensereport.pdf');



    //Inventory Customer Report
    Route::get('report/pos/posuserstatement', 'ReportController@posUserStatement')->name('report.posuserstatement');
    Route::post('report/pos/posuserstatement', 'ReportController@showPosUserstatement')->name('report.showposuserstatement');
    Route::post('report/pos/posuserstatement/pdf', 'ReportController@pdfPosUserstatement')->name('report.pdfposuserstatement');
    //Inventory Customer Detail Report
    Route::get('report/pos/posdeatailstatement', 'ReportController@posDeatilStatement')->name('report.posdetailstatement');
    Route::post('report/pos/posdeatailstatement', 'ReportController@showPosDeatilStatement')->name('report.showposdetailstatement');
    Route::post('report/pos/posdeatailstatement/pdf', 'ReportController@pdfPosDeatilStatement')->name('report.pdfposdetailstatement');
    //Cash Report
    Route::get('report/cashreport', 'ReportController@cashreport')->name('report.poscashreport');
    Route::post('report/cashreport', 'ReportController@showcashreport')->name('report.showcashreport');
    Route::post('report/cashreport/pdf', 'ReportController@pdfcashreport')->name('report.pdfcashreport');

    Route::resource('challan','ChallanController');
    Route::post('challan/generate_pdf/{id}','ChallanController@generatePDF')->name('challan.pdf');

    //Sales Invoice
    Route::resource('sales_invoice', 'SaleController');
    Route::post('sales_invoice/saleresult','SaleController@result')->name('sales_invoice.result');
    Route::post('sales_invoice/{id}/invoice', 'SaleController@invoice')->name('sales_invoice.invoice');

    Route::resource('suppliersection/supplierdue', 'SupplierdueController');
    Route::resource('pos/customers', 'Pos\UserController');
    Route::post('pos/customers/export', 'Pos\UserController@export')->name('user.export');
    Route::get('/get_customers_and_products','ChallanController@getCustomersAndProducts');

    Route::resource('product_section/products', 'ProductController');
    Route::resource('product_section/raw', 'RawmaterialsController');

    Route::post('product_section/products/export', 'ProductController@export')->name('product.export');
    Route::post('removegalleryimage/{id}', 'ProductController@removegalleryimage')->name('products.removegalleryimage');
    Route::resource('product_section/sizes', 'SizeController');
    Route::resource('product_section/categories', 'CategoryController')->except('update');
    Route::post('product_section/categories/{id}', 'CategoryController@update')->name('categories.update');


    Route::resource('product_section/brands', 'BrandController')->except('update');
    Route::post('product_section/brands/{id}', 'BrandController@update')->name('brands.update');


    Route::resource('product_section/product_types', 'ProductTypeController')->except('update');
    Route::post('product_section/product_types/{id}', 'ProductTypeController@update')->name('product_types.update');


    Route::get('pos/cashresult','Pos\CashController@index');
    Route::get('pos/cashresult','Pos\CashController@result')->name('cash.result');
    Route::resource('pos/prevdue', 'Pos\PrevdueController');
    Route::resource('purchase', 'PurchaseController');
    Route::get('inventory/dashboard/cashdetails/{id}', 'adminController@inv_pendingcash')->name('invdashboard.cashdetails');




    Route::put('allprice/{id}','PriceController@update')->name('price.update');
    Route::get('tp','PriceController@tpindex')->name('tp.index');
    Route::put('tp/{id}','PriceController@tpupdate')->name('tp.update');
    Route::resource('suppliersection/payment', 'PaymentController');


    Route::resource('suppliersection/suppliers', 'SupplierController');
    Route::post('purchase/result','PurchaseController@result')->name('purchase.result');
    Route::get('purchase/result','PurchaseController@index');

    Route::resource('pos/returnproduct', 'Pos\ReturnproductController');
    Route::post('pos/returnproductresult','Pos\ReturnproductController@result')->name('returnproduct.result');
    Route::get('pos/returnproductresult','Pos\ReturnproductController@index');
    Route::post('pos/returnproduct/{id}/invoice', 'Pos\ReturnproductController@invoice')->name('returnproduct.invoice');
    Route::get('inventory/dashboard/viewreturns/{id}', 'Pos\ReturnproductController@show')->name('viewreturns.show');
    Route::resource('pos/cash', 'Pos\CashController');
    Route::get('last10cash','Pos\CashController@last10')->name('cash.last10');
    Route::post('cash/datewise','Pos\CashController@datewise')->name('cash.datewise');

    Route::resource('marketingreport','MarketingReportController');
    Route::post('marketingreport/datewiseview','MarketingReportController@datewiseview')->name('marketingreport.datewiseview');



    Route::get('company','CompanyController@index')->name('company.index');
    Route::get('company/{id}/edit','CompanyController@edit')->name('company.edit');
    Route::put('company/{id}','CompanyController@update')->name('company.update');
    Route::resource('ecom/paymentmethod', 'PaymentmethodController');
/*    Route::resource('ecom/deliveryinfo', 'DeliveryinfoController')->only(['index' ,'edit', 'update']);*/
    Route::post('pos/cash/money_receipt/{id}', 'Pos\CashController@generateMoneyRecipt')->name('cash.money_receipt');
    Route::post('pos/cash/approve/{id}', 'Pos\CashController@approve')->name('cash.approve');
    Route::post('pos/cash/cancel/{id}', 'Pos\CashController@cancel')->name('cash.cancel');
    Route::post('pos/sale/approve/{id}', 'SaleController@approve')->name('sale.approve');

    Route::post('pos/returnproduct/approve/{id}', 'Pos\ReturnproductController@approve')->name('returnproduct.approve');


    Route::get('generaloption','GeneralOptionController@index')->name('generaloption.index');
    Route::get('generaloption/{id}/edit','GeneralOptionController@edit')->name('generaloption.edit');
    Route::put('generaloption/{id}','GeneralOptionController@update')->name('generaloption.update');
    Route::resource('emp_type','EmployeeTypeController');
    Route::resource('employee','EmployeeController');
    Route::get('getemployeecust/{id}','EmployeeController@getEmployeeCust')->name('employeecust.get');
    Route::resource('backups', 'BackupController')->only(['index', 'store', 'destroy']);
    Route::get('backups/{file_name}', 'BackupController@download')->name('backups.download');
    Route::delete('backups', 'BackupController@clean')->name('backups.clean');
    Route::get('sms_notification_settings','smsNotificationsSettingsController@index')->name('sms.notifications.settings');
    Route::get('sms_notification_settings/{id}/edit','smsNotificationsSettingsController@edit')->name('sms.notifications.edit');

});




