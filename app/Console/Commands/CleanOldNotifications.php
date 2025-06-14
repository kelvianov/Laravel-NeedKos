<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CleanOldNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:old-notifications {--all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean old notifications and leave only Filament compatible ones';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('=== Cleaning Old Notifications ===');
        
        if ($this->option('all')) {
            // Delete all notifications
            $count = DB::table('notifications')->count();
            DB::table('notifications')->delete();
            $this->info("Deleted all {$count} notifications");
        } else {
            // Delete only non-Filament notifications
            $count = DB::table('notifications')
                ->where('type', '!=', 'Filament\\Notifications\\DatabaseNotification')
                ->count();
                
            DB::table('notifications')
                ->where('type', '!=', 'Filament\\Notifications\\DatabaseNotification')
                ->delete();
                
            $this->info("Deleted {$count} non-Filament notifications");
        }
        
        // Show remaining notifications
        $remaining = DB::table('notifications')->count();
        $this->info("Remaining notifications: {$remaining}");
        
        return 0;
    }
}
