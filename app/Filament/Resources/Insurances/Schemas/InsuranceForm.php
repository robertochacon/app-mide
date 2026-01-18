<?php

namespace App\Filament\Resources\Insurances\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InsuranceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                
                Textarea::make('address')
                    ->label('Dirección')
                    ->rows(3)
                    ->columnSpanFull(),
                
                TextInput::make('phone')
                    ->label('Teléfono')
                    ->tel()
                    ->maxLength(255),
                
                TextInput::make('email')
                    ->label('Correo Electrónico')
                    ->email()
                    ->maxLength(255),
                
                TextInput::make('coverage_or_rates')
                    ->label('Cobertura (Monto)')
                    ->numeric()
                    ->prefix('$')
                    ->step(0.01)
                    ->nullable(),
            ]);
    }
}
