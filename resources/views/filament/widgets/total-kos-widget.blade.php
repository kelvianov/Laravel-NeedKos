<div>
    <x-filament::widget>
        <x-filament::card class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-5">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide">
                        Total Kos
                    </h3>
                    <p class="mt-1 text-3xl font-bold text-gray-900 dark:text-white">
                        {{ $totalKos }}
                    </p>
                </div>
                <div class="p-3 bg-primary-100 dark:bg-primary-700 rounded-full">
                    <x-heroicon-o-home class="w-7 h-7 text-primary-600 dark:text-primary-200" />
                </div>
            </div>
        </x-filament::card>
    </x-filament::widget>
</div>
