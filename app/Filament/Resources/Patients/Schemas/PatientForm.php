<?php

namespace App\Filament\Resources\Patients\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PatientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('last_name')
                    ->label('Apellido')
                    ->required()
                    ->maxLength(255),
                
                DatePicker::make('date_of_birth')
                    ->label('Fecha de Nacimiento')
                    ->displayFormat('d/m/Y')
                    ->native(false)
                    ->maxDate(now()),
                
                Select::make('gender')
                    ->label('Género')
                    ->options([
                        'male' => 'Masculino',
                        'female' => 'Femenino',
                        'other' => 'Otro',
                    ])
                    ->nullable(),
                
                TextInput::make('phone')
                    ->label('Teléfono')
                    ->tel()
                    ->maxLength(255),
                
                TextInput::make('email')
                    ->label('Correo Electrónico')
                    ->email()
                    ->maxLength(255),
                
                Textarea::make('address')
                    ->label('Dirección')
                    ->rows(3)
                    ->columnSpanFull(),
                
                TextInput::make('identification_number')
                    ->label('Número de Identificación')
                    ->maxLength(255),
                
                Select::make('insurance_id')
                    ->label('Seguro Médico')
                    ->relationship('insurance', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),
                
                Textarea::make('notes')
                    ->label('Notas')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}
