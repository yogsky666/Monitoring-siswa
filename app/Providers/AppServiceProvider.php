<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

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
        Schema::defaultStringLength(191);
        Carbon::setLocale('id'); // Set lokal ke bahasa Indonesia
    }

    public function showTime()
    {
        // Mendapatkan waktu sekarang dalam zona waktu Asia/Jakarta
        $now = Carbon::now('Asia/Jakarta');

        // Tampilkan hasil
        return "Sekarang adalah: " . $now->format('d F Y H:i:s') . " (WIB)";
    }
}
