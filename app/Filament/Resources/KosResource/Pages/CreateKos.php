<?php

namespace App\Filament\Resources\KosResource\Pages;

use App\Filament\Resources\KosResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKos extends CreateRecord
{
    protected static string $resource = KosResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
