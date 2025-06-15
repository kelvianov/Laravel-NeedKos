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
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Support\Enums\FontWeight;

class ViewReport extends ViewRecord
{
    protected static string $resource = ReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('updateStatus')
                ->label('Update Status & Response')
                ->icon('heroicon-o-pencil-square')
                ->color('primary')
                ->form([                    Select::make('status')
                        ->label('Report Status')
                        ->options([
                            'pending' => 'Pending Review',
                            'in_progress' => 'In Progress',
                            'resolved' => 'Resolved',
                            'closed' => 'Closed'
                        ])
                        ->default(fn () => $this->record->status)
                        ->required()
                        ->native(false)
                        ->searchable()
                        ->placeholder('Choose status...')
                        ->helperText('Update the current processing status'),Textarea::make('admin_notes')
                        ->label('Administrative Response')
                        ->rows(5)
                        ->default(fn () => $this->record->admin_notes)
                        ->placeholder('Provide detailed notes about the resolution or actions taken...')
                        ->helperText('This response will be visible to the reporter'),
                ])
                ->action(function (array $data) {
                    $this->record->update([
                        'status' => $data['status'],
                        'admin_notes' => $data['admin_notes'],
                        'admin_id' => Auth::id(),
                    ]);

                    Notification::make()
                        ->title('Report Updated Successfully')
                        ->body('The report status and administrative response have been updated.')
                        ->success()
                        ->duration(3000)
                        ->send();

                    // Refresh the page
                    $this->redirect(request()->header('Referer'));
                })                ->modalHeading('Update Report Status & Response')
                ->modalDescription('Provide an update on the report status and add your administrative response.')
                ->modalSubmitActionLabel('Update Report')
                ->modalCancelActionLabel('Cancel')
                ->requiresConfirmation()
                ->modalIcon('heroicon-o-shield-check'),Actions\Action::make('markAsRead')
                ->label('Mark as Read')
                ->icon('heroicon-o-eye')
                ->color('success')
                ->action(function () {
                    $this->record->markAsRead(Auth::id());
                    
                    Notification::make()
                        ->title('Report Marked as Read')
                        ->body('This report has been marked as read.')
                        ->success()
                        ->send();

                    $this->redirect(request()->header('Referer'));
                })
                ->visible(fn () => is_null($this->record->read_at))
                ->requiresConfirmation()
                ->modalHeading('Mark Report as Read')
                ->modalDescription('Are you sure you want to mark this report as read?')
                ->modalSubmitActionLabel('Mark as Read'),

            Actions\Action::make('backToReports')
                ->label('Back to Reports')
                ->icon('heroicon-o-arrow-left')
                ->color('gray')
                ->url(fn () => ReportResource::getUrl('index'))
                ->tooltip('Return to reports list'),
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
    
    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                // Header Status Card
                Section::make()
                    ->schema([                        Grid::make(4)
                            ->schema([                                TextEntry::make('subject')
                                    ->label('Report Title')
                                    ->weight(FontWeight::Bold)
                                    ->size('sm')
                                    ->color('primary')
                                    ->columnSpan(3),
                                TextEntry::make('status')
                                    ->label('Status')
                                    ->badge()
                                    ->size('lg')
                                    ->color(fn (string $state): string => match ($state) {
                                        'pending' => 'warning',
                                        'in_progress' => 'info',
                                        'resolved' => 'success',
                                        'closed' => 'gray',
                                        default => 'gray',
                                    })
                                    ->formatStateUsing(fn (string $state): string => match ($state) {
                                        'pending' => 'Pending',
                                        'in_progress' => 'In Progress',
                                        'resolved' => 'Resolved',
                                        'closed' => 'Closed',
                                        default => ucfirst($state),
                                    }),
                            ])
                    ])
                    ->columnSpanFull(),

                // Main Information Grid
                Grid::make(3)
                    ->schema([                        // Reporter Information Card
                        Section::make('Reporter Information')
                            ->description('Details about the person who submitted this report')
                            ->icon('heroicon-o-user-circle')
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Name')
                                    ->icon('heroicon-o-user')
                                    ->weight(FontWeight::Medium)
                                    ->color('primary'),
                                TextEntry::make('email')
                                    ->label('Email')
                                    ->icon('heroicon-o-envelope')
                                    ->copyable()
                                    ->copyMessage('Email copied!')
                                    ->copyMessageDuration(1500),
                                TextEntry::make('created_at')
                                    ->label('Submitted At')
                                    ->icon('heroicon-o-calendar')
                                    ->dateTime()
                                    ->color('gray'),
                            ])
                            ->compact(),

                        // Report Classification Card
                        Section::make('Report Classification')
                            ->description('Category and priority information')
                            ->icon('heroicon-o-tag')
                            ->schema([
                                TextEntry::make('category')
                                    ->label('Category')
                                    ->icon('heroicon-o-folder')
                                    ->badge()
                                    ->color('info'),                                TextEntry::make('priority')
                                    ->label('Priority Level')
                                    ->icon('heroicon-o-exclamation-triangle')
                                    ->badge()
                                    ->color(fn (string $state): string => match ($state) {
                                        'low' => 'success',
                                        'medium' => 'warning',
                                        'high' => 'danger',
                                        default => 'gray',
                                    }),
                            ])
                            ->compact(),// Tracking Information Card
                        Section::make('Tracking Information')
                            ->description('Report tracking and status updates')
                            ->icon('heroicon-o-clipboard-document-check')
                            ->schema([
                                TextEntry::make('read_at')
                                    ->label('Read At')
                                    ->icon('heroicon-o-eye')
                                    ->dateTime()
                                    ->placeholder('Not read yet')
                                    ->color(fn ($state) => $state ? 'success' : 'warning'),
                                TextEntry::make('updated_at')
                                    ->label('Last Updated')
                                    ->icon('heroicon-o-clock')
                                    ->dateTime()
                                    ->color('gray'),
                                TextEntry::make('admin.name')
                                    ->label('Handled By')
                                    ->icon('heroicon-o-user')
                                    ->placeholder('Not assigned')
                                    ->color('primary'),
                            ])
                            ->compact(),
                    ]),                // Description Section
                Section::make('Report Description')
                    ->description('Detailed description of the issue or concern')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        TextEntry::make('message')
                            ->label('')
                            ->prose()
                            ->markdown()
                            ->columnSpanFull(),
                    ])
                    ->collapsible()
                    ->collapsed(false),

                // Admin Response Section
                Section::make('Administrative Response')
                    ->description('Official response and resolution notes from administration')
                    ->icon('heroicon-o-shield-check')
                    ->schema([
                        TextEntry::make('admin_notes')
                            ->label('Admin Notes')
                            ->prose()
                            ->markdown()
                            ->placeholder('No administrative response has been provided yet.')
                            ->columnSpanFull(),
                    ])                    ->collapsible()
                    ->collapsed(fn ($record) => !$record->admin_notes)
                    ->visible(fn ($record) => $record->admin_notes || $record->admin_id),
            ]);
    }
}
