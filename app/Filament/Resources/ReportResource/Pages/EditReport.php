<?php

namespace App\Filament\Resources\ReportResource\Pages;

use App\Filament\Resources\ReportResource;
use App\Mail\ReportStatusUpdate;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class EditReport extends EditRecord
{
    protected static string $resource = ReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $record = $this->getRecord();
        $originalStatus = $record->getOriginal('status');
        $newStatus = $record->status;

        // Check if status has changed
        if ($originalStatus !== $newStatus && $originalStatus !== null) {
            try {
                // Get admin name
                $admin = Auth::user();
                $adminName = $admin ? $admin->name : 'Admin NeedKos';

                // Send status update email to user
                Mail::to($record->email)->send(
                    new ReportStatusUpdate($record, $originalStatus, $newStatus, $adminName)
                );

                Log::info('Status update email sent', [
                    'report_id' => $record->id,
                    'user_email' => $record->email,
                    'old_status' => $originalStatus,
                    'new_status' => $newStatus,
                    'admin' => $adminName
                ]);

                // Show success notification to admin
                \Filament\Notifications\Notification::make()
                    ->title('Status Updated')
                    ->body("Email notification sent to {$record->name}")
                    ->success()
                    ->send();

            } catch (\Exception $e) {
                Log::error('Failed to send status update email', [
                    'report_id' => $record->id,
                    'error' => $e->getMessage()
                ]);

                \Filament\Notifications\Notification::make()
                    ->title('Warning')
                    ->body('Status updated but failed to send email notification')
                    ->warning()
                    ->send();
            }
        }
    }
}
