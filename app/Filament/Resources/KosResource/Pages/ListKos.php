<?php

namespace App\Filament\Resources\KosResource\Pages;

use App\Filament\Resources\KosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKos extends ListRecords
{
    protected static string $resource = KosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
