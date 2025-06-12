<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // View composer untuk navbar agar bisa akses data locations
        view()->composer('components.navbar', function ($view) {
            $indonesianCities = [
                'Jakarta' => [
                    'Menteng', 'Kemang', 'Kuningan', 'Sudirman', 'Thamrin', 'Tebet', 'Kelapa Gading'
                ],
                'Bandung' => [
                    'Dago', 'Riau', 'Buah Batu', 'Pasteur', 'Setiabudi', 'Dipatiukur', 'Ciumbuleuit'
                ],
                'Yogyakarta' => [
                    'Malioboro', 'Seturan', 'Jakal', 'Kaliurang', 'Prawirotaman', 'Gejayan', 'Babarsari'
                ],
                'Surabaya' => [
                    'Gubeng', 'Wonokromo', 'Darmo', 'Rungkut', 'Wiyung', 'Mulyorejo', 'Tenggilis'
                ],
                'Malang' => [
                    'Lowokwaru', 'Klojen', 'Blimbing', 'Sukun', 'Kedungkandang'
                ],
                'Semarang' => [
                    'Tembalang', 'Banyumanik', 'Gajahmungkur', 'Pedurungan', 'Genuk'
                ],
                'Medan' => [
                    'Medan Baru', 'Medan Timur', 'Medan Barat', 'Medan Utara', 'Medan Selatan'
                ],
                'Palembang' => [
                    'Ilir Barat', 'Ilir Timur', 'Seberang Ulu', 'Gandus', 'Sako'
                ],
                'Denpasar' => [
                    'Sanur', 'Renon', 'Sesetan', 'Panjer', 'Ubung'
                ],
                'Bekasi' => [
                    'Bekasi Barat', 'Bekasi Timur', 'Bekasi Utara', 'Bekasi Selatan', 'Rawalumbu'
                ],
                'Tangerang' => [
                    'Tangerang Kota', 'Cipondoh', 'Karawaci', 'Serpong', 'Alam Sutera'
                ],
                'Bogor' => [
                    'Bogor Tengah', 'Bogor Utara', 'Bogor Selatan', 'Bogor Timur', 'Bogor Barat'
                ]
            ];

            $locations = [];
            foreach ($indonesianCities as $cityName => $areas) {
                $locations[] = [
                    'name' => $cityName,
                    'areas' => array_map(function($area) {
                        return ['name' => $area];
                    }, $areas)
                ];
            }

            $view->with('locations', $locations);
        });
    }
}
