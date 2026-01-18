<?php

namespace App\Filament\Resources\Patients\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PatientsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('last_name')
                    ->label('Apellido')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('date_of_birth')
                    ->label('Fecha de Nacimiento')
                    ->date('d/m/Y')
                    ->sortable(),
                
                TextColumn::make('gender')
                    ->label('Género')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'male' => 'Masculino',
                        'female' => 'Femenino',
                        'other' => 'Otro',
                        default => $state,
                    })
                    ->sortable(),
                
                TextColumn::make('phone')
                    ->label('Teléfono')
                    ->searchable(),
                
                TextColumn::make('email')
                    ->label('Correo Electrónico')
                    ->searchable(),
                
                TextColumn::make('insurance.name')
                    ->label('Seguro Médico')
                    ->searchable()
                    ->sortable()
                    ->placeholder('Sin seguro'),
                
                TextColumn::make('user.name')
                    ->label('Registrado por')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                TextColumn::make('created_at')
                    ->label('Fecha de Registro')
                    ->dateTime('d/m/Y H:i')
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
