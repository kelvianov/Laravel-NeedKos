<div>
    @if(auth()->user()->role === 'admin')
        <x-filament::widget>
            <x-filament::card class="bg-white dark:bg-gray-800 shadow-sm border border-gray-200 dark:border-gray-700 rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Reports</p>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($totalReports) }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $pendingReports }} pending, {{ $resolvedReports }} resolved</p>
                        </div>
                        <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                            <x-heroicon-o-exclamation-triangle class="w-6 h-6 text-red-600 dark:text-red-400" />
                        </div>
                    </div>
                </div>
            </x-filament::card>
        </x-filament::widget>
    @endif
</div>
