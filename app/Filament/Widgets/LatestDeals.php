<?php

namespace App\Filament\Widgets;

use App\Models\Deal;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestDeals extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Deal::query()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Darījums')
                    ->searchable(),

                Tables\Columns\TextColumn::make('customer.company_name')
                    ->label('Klients')
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('status.name')
                    ->label('Statuss'),

                Tables\Columns\TextColumn::make('value')
                    ->label('Vērtība')
                    ->money('EUR'),

                Tables\Columns\TextColumn::make('expected_close_date')
                    ->label('Plānotais datums')
                    ->date('d.m.Y'),
            ]);
    }
}
