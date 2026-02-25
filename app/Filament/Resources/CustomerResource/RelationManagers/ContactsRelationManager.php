<?php

namespace App\Filament\Resources\CustomerResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ContactsRelationManager extends RelationManager
{
    protected static string $relationship = 'contacts';
    protected static ?string $title = 'Kontaktpersonas';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                    ->label('Vārds')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('last_name')
                    ->label('Uzvārds')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('position')
                    ->label('Amats')
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->label('E-pasts')
                    ->email()
                    ->maxLength(255),

                Forms\Components\TextInput::make('phone')
                    ->label('Telefons')
                    ->tel()
                    ->maxLength(255),

                Forms\Components\TextInput::make('mobile')
                    ->label('Mobilais')
                    ->tel()
                    ->maxLength(255),

                Forms\Components\Toggle::make('is_primary')
                    ->label('Primārā kontaktpersona')
                    ->default(false),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->label('Vārds')
                    ->searchable(),

                Tables\Columns\TextColumn::make('last_name')
                    ->label('Uzvārds')
                    ->searchable(),

                Tables\Columns\TextColumn::make('position')
                    ->label('Amats'),

                Tables\Columns\TextColumn::make('email')
                    ->label('E-pasts')
                    ->copyable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Telefons'),

                Tables\Columns\IconColumn::make('is_primary')
                    ->label('Primārā')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_primary')
                    ->label('Tikai primārās'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Pievienot kontaktpersonu'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
