<div>
    <x-filament::widget>
        <x-filament::card class="relative bg-white dark:bg-gray-900 shadow-xl rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-800 backdrop-blur-sm transition-all duration-500 hover:shadow-2xl hover:scale-[1.02] group">
            <!-- Premium gradient header with animation -->
            <div class="absolute top-0 left-0 h-1 w-full bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 animate-pulse"></div>

            <!-- Sophisticated background pattern -->
            <div class="absolute inset-0 bg-gradient-to-br from-slate-50/50 to-blue-50/30 dark:from-gray-900/50 dark:to-blue-900/10"></div>
            
            <!-- Subtle grid pattern overlay -->
            <div class="absolute inset-0 opacity-[0.02] dark:opacity-[0.05]" style="background-image: radial-gradient(circle at 1px 1px, rgba(0,0,0,0.15) 1px, transparent 0); background-size: 20px 20px;"></div>

            <!-- Content -->
            <div class="relative p-8">
                <div class="flex items-start justify-between">
                    <div class="space-y-3 flex-1">
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-blue-500 dark:bg-blue-400 rounded-full animate-pulse"></div>
                            <h2 class="text-sm font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Total Properti Kos
                            </h2>
                        </div>

                        <!-- Main Number -->
                        <p class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400">
                            {{ number_format($totalKos) }}
                        </p>

                        <!-- Trend Indicator -->
                        <div class="flex items-center space-x-2">
                            @if($trendStatus === 'new')
                                <div class="flex items-center px-3 py-1 bg-blue-100 dark:bg-blue-900/30 rounded-full">
                                    <span class="text-sm font-semibold text-blue-700 dark:text-blue-300 -ml-1">
                                        Baru vs Bulan lalu
                                    </span>
                                </div>
                            @elseif($trendStatus === 'up')
                                <div class="flex items-center px-3 py-1 bg-green-100 dark:bg-green-900/30 rounded-full">
                                    <x-heroicon-s-arrow-trending-up class="w-4 h-4 text-green-600 dark:text-green-400 mr-1" />
                                    <span class="text-sm font-semibold text-green-700 dark:text-green-300">+{{ $trendPercentage }}%</span>
                                </div>
                            @elseif($trendStatus === 'down')
                                <div class="flex items-center px-3 py-1 bg-red-100 dark:bg-red-900/30 rounded-full">
                                    <x-heroicon-s-arrow-trending-down class="w-4 h-4 text-red-600 dark:text-red-400 mr-1" />
                                    <span class="text-sm font-semibold text-red-700 dark:text-red-300">{{ $trendPercentage }}%</span>
                                </div>
                            @else
                                <div class="flex items-center px-3 py-1 bg-gray-100 dark:bg-gray-800 rounded-full">
                                    <x-heroicon-s-minus class="w-4 h-4 text-gray-600 dark:text-gray-400 mr-1" />
                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Stabil</span>
                                </div>
                            @endif
                        </div>

                        <!-- Additional Stats -->
                        <div class="space-y-1">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Kos Aktif</span>
                                <span class="font-semibold text-gray-700 dark:text-gray-300">{{ number_format($activeKos) }}</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-gray-500 dark:text-gray-400">Unit Tersedia</span>
                                <span class="font-semibold text-gray-700 dark:text-gray-300">{{ number_format($availableRooms) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Icon Section -->
                    <div class="flex-shrink-0">
                        <div class="p-3 bg-primary-100 dark:bg-primary-700 rounded-full">
                            <x-heroicon-o-building-office-2 class="w-7 h-7 text-primary-600 dark:text-primary-200" />
                        </div>
                    </div>
                </div>

                <!-- Bottom stats bar -->
                <div class="mt-6 pt-4 border-t border-gray-200/50 dark:border-gray-700/50">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500 dark:text-gray-400">Last Update: {{ $lastUpdated }}</span>
                        <div class="flex items-center space-x-1">
                            <div class="w-2 h-2 bg-green-500 dark:bg-green-400 rounded-full animate-pulse"></div>
                            <span class="text-green-600 dark:text-green-400 font-medium">Live</span>
                        </div>
                    </div>
                </div>
            </div>
        </x-filament::card>
    </x-filament::widget>
</div>
