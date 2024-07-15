<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Coupon;
use Illuminate\Support\Facades\Schema;
use App\Observers\BonObserver;
use App\Models\Transaction;
use App\Observers\TransactionObserver;
use App\Models\Link;
use App\Observers\LinkObserver;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Coupon::observe(BonObserver::class);
    
         Link::observe(LinkObserver::class);

        Transaction::observe(TransactionObserver::class);
        Schema::defaultStringLength(191);
        
    }
}
