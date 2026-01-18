<?php

namespace App\Filament\Resources\Services\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('description')
                    ->label('Descripción')
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->description)
                    ->searchable(),
                
                TextColumn::make('cost')
                    ->label('Costo')
                    ->money('USD')
                    ->sortable(),
                
                TextColumn::make('insurance.name')
                    ->label('Seguro Médico')
                    ->searchable()
                    ->sortable()
                    ->placeholder('N/A'),
                
                IconColumn::make('applies_insurance')
                    ->label('Aplica Seguro')
                    ->boolean(),
                
                TextColumn::make('user.name')
                    ->label('Usuario')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('created_at')
                    ->label('Fecha de Creación')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
