<?php

namespace App\Filament\Resources\DealStatusResource\Pages;

use App\Filament\Resources\DealStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDealStatus extends EditRecord
{
    protected static string $resource = DealStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
