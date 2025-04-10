<?php

namespace App\Providers;


use App\Page;
use App\Company;
use App\Product;
use App\Category;
use App\Headertop;
use App\ProductType;
use App\Subcategory;
use App\GeneralOption;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $seconds =  env('CACHE_REMEMBER_IN_SECONDS') ?? 86400;
            $g_opt = Cache::remember('g_opt', $seconds, function () {
                return  GeneralOption::first();
            });
            $g_opt_value = json_decode($g_opt->options, true);
            $CompanyInfo  = Cache::remember('company_info', $seconds, function () {
                return  Company::first();
            });
            $view->with('g_opt_value', $g_opt_value);
            $view->with('CompanyInfo', $CompanyInfo);

        });

        Schema::defaultStringLength(191);
    }
}
