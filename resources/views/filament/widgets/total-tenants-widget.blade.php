<div>
    <x-filament::card class="relative bg-white dark:bg-gray-900 shadow-xl rounded-2xl overflow-hidden p-5">
        <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-primary-500 to-primary-700"></div>

        <div class="flex items-start justify-between">
            <div class="space-y-1">
                <h2 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-widest">
                    Jumlah Penyewa
                </h2>
                <p class="text-4xl font-extrabold text-gray-900 dark:text-white">
                    {{ $totalTenants }}
                </p>
                <div class="flex items-center text-sm mt-1
                    @php
                        if($tenantTrendUp === 'baru') {
                            echo 'text-green-500';
                        } elseif($tenantTrendUp > 0) {
                            echo 'text-green-500';
                        } elseif($tenantTrendUp < 0) {
                            echo 'text-red-500';
                        } else {
                            echo 'text-gray-500';
                        }
                    @endphp
                ">
                    @if($tenantTrendUp === 'baru')
                        <span class="inline-flex items-center text-green-500 ml-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <polyline points="3 17 7 13 11 17 15 9 19 13" />
                                <polyline points="19 13 19 7 13 7" />
                            </svg>
                            <span class="ml-1">Baru bulan ini</span>
                        </span>
                    @elseif($tenantTrendUp > 0)
                        <span class="inline-flex items-center text-green-500 ml-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 17l6-6 4 4 8-8" />
                            </svg>
                            <span class="ml-1">+{{ $tenantTrendUp }}% bulan ini</span>
                        </span>
                    @elseif($tenantTrendUp < 0)
                        <span class="inline-flex items-center text-red-500 ml-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 7l-6 6-4-4-8 8" />
                            </svg>
                            <span class="ml-1">{{ $tenantTrendUp }}% bulan ini</span>
                        </span>
                    @else
                        <span class="inline-flex items-center text-gray-500 ml-1">
                            <x-heroicon-o-minus class="w-4 h-4" />
                            <span class="ml-1">Belum ada data penyewa bulan ini</span>
                        </span>
                    @endif
                </div>
            </div>

            <div class="p-3 bg-primary-100 dark:bg-primary-700 rounded-full">
                <x-heroicon-o-user-group class="w-7 h-7 text-primary-600 dark:text-primary-200" />
            </div>
        </div>
    </x-filament::card>
</div>
