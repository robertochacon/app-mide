<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                
                Textarea::make('description')
                    ->label('Descripción')
                    ->rows(3)
                    ->columnSpanFull(),
                
                TextInput::make('cost')
                    ->label('Costo')
                    ->numeric()
                    ->prefix('$')
                    ->required()
                    ->step(0.01),
                
                Select::make('insurance_id')
                    ->label('Seguro Médico')
                    ->relationship('insurance', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),
                
                Select::make('user_id')
                    ->label('Usuario')
                    ->relationship('user', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                
                Checkbox::make('applies_insurance')
                    ->label('Aplica Seguro')
                    ->default(false),
            ]);
    }
}
