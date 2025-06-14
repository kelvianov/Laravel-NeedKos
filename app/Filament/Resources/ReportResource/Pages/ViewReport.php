<?php

namespace App\Filament\Resources\ReportResource\Pages;

use App\Filament\Resources\ReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class ViewReport extends ViewRecord
{
    protected static string $resource = ReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\Action::make('adminResponse')
                ->label('Admin Response')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->color('success')
                ->form([
                    Select::make('status')
                        ->label('Status')
                        ->options([
                            'pending' => 'Pending',
                            'in_progress' => 'In Progress',
                            'resolved' => 'Resolved',
                            'closed' => 'Closed'
                        ])
                        ->default(fn () => $this->record->status)
                        ->required(),
                    Textarea::make('admin_notes')
                        ->label('Admin Notes')
                        ->rows(4)
                        ->default(fn () => $this->record->admin_notes)
                        ->placeholder('Add notes about this report resolution...'),
                ])
                ->action(function (array $data) {
                    $this->record->update([
                        'status' => $data['status'],
                        'admin_notes' => $data['admin_notes'],
                        'admin_id' => Auth::id(),
                    ]);

                    Notification::make()
                        ->title('Admin response updated successfully')
                        ->success()
                        ->send();

                    // Refresh the page data
                    $this->refreshFormData([
                        'status',
                        'admin_notes',
                        'admin_id'
                    ]);
                })
                ->modalHeading('Update Admin Response')
                ->modalDescription('Update the status and add notes for this report')
                ->modalSubmitActionLabel('Update Response'),
            Actions\Action::make('markAsRead')
                ->label('Mark as Read')
                ->icon('heroicon-o-eye')
                ->action(function () {
                    $this->record->markAsRead(Auth::id());
                    $this->refreshFormData(['read_at']);
                    
                    Notification::make()
                        ->title('Report marked as read')
                        ->success()
                        ->send();
                })
                ->visible(fn () => is_null($this->record->read_at)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Mark as read when viewing
        if (is_null($this->record->read_at)) {
            $this->record->markAsRead(Auth::id());
        }
        
        return $data;
    }
}
