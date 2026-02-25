<?php

namespace App\Filament\Widgets;

use App\Models\Inventory;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LowStockAlert extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Inventory::whereRaw('quantity <= min_stock')
                    ->with('product')
                    ->orderBy('quantity', 'asc')
            )
            ->columns([
                Tables\Columns\TextColumn::make('product.sku')
                    ->label('SKU')
                    ->searchable(),

                Tables\Columns\TextColumn::make('product.name')
                    ->label('Produkts')
                    ->searchable(),

                Tables\Columns\TextColumn::make('quantity')
                    ->label('Krājumi')
                    ->badge()
                    ->color('danger'),

                Tables\Columns\TextColumn::make('min_stock')
                    ->label('Min. krājumi'),

                Tables\Columns\TextColumn::make('location')
                    ->label('Atrašanās vieta'),
            ])
            ->heading('Zemi krājumi - nepieciešama papildināšana');
    }
}
