<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ProductTypesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SizesTableSeeder::class);
        $this->call(ProductTagsTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(AdjustsTableSeeder::class);
        $this->call(DivisionsTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PaymentmethodsTableSeeder::class);
        $this->call(CashesTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(ChallansTableSeeder::class);
        $this->call(ChallanProductTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(EmployeeTypesTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(ExpensecategoriesTableSeeder::class);
        $this->call(ExpensesTableSeeder::class);
        $this->call(GeneralOptionsTableSeeder::class);
        $this->call(MarketingReportsTableSeeder::class);
        $this->call(PrevduesTableSeeder::class);
        $this->call(PriceRequestsTableSeeder::class);
        $this->call(ReturnproductsTableSeeder::class);
        $this->call(ProductReturnproductTableSeeder::class);
        $this->call(SalesTableSeeder::class);
        $this->call(ProductSaleTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(PurchasesTableSeeder::class);
        $this->call(ProductPurchaseTableSeeder::class);
        $this->call(RolesAndPermissionSedder::class);
        $this->call(SmsLogsTableSeeder::class);
        $this->call(SmsconfigsTableSeeder::class);
        $this->call(SupplierduesTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);


    }
}
