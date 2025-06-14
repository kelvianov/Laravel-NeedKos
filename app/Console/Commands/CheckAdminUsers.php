<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckAdminUsers extends Command
{
    protected $signature = 'check:admin-users';
    protected $description = 'Check admin users and their notifications';

    public function handle()
    {
        $this->info('=== ADMIN USERS ===');
        $admins = User::where('role', 'admin')->get();
        
        foreach ($admins as $admin) {
            $this->line("ID: {$admin->id} | Name: {$admin->name} | Email: {$admin->email}");
            $notificationCount = $admin->notifications()->count();
            $unreadCount = $admin->unreadNotifications()->count();
            $this->line("  - Total notifications: {$notificationCount}");
            $this->line("  - Unread notifications: {$unreadCount}");
            $this->line('');
        }

        $this->info('=== RECENT NOTIFICATIONS ===');
        $notifications = DB::table('notifications')->latest()->limit(5)->get();
        foreach ($notifications as $notification) {
            $data = json_decode($notification->data, true);
            $this->line("ID: {$notification->id}");
            $this->line("User: {$notification->notifiable_id}");
            $this->line("Title: " . ($data['title'] ?? 'No title'));
            $this->line("Read: " . ($notification->read_at ? 'Yes' : 'No'));
            $this->line('---');
        }
    }
}
