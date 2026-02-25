<?php

namespace App\Filament\Resources\CustomerSegmentResource\Pages;

use App\Filament\Resources\CustomerSegmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCustomerSegment extends EditRecord
{
    protected static string $resource = CustomerSegmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
