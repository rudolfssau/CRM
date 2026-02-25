<?php

namespace App\Filament\Resources\DealStatusResource\Pages;

use App\Filament\Resources\DealStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDealStatuses extends ListRecords
{
    protected static string $resource = DealStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
