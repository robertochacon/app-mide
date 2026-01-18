<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                
                TextInput::make('email')
                    ->label('Correo Electrónico')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                
                TextInput::make('password')
                    ->label('Contraseña')
                    ->password()
                    ->required(fn ($livewire) => $livewire instanceof \App\Filament\Resources\Users\Pages\CreateUser)
                    ->dehydrated(fn ($state) => filled($state))
                    ->minLength(8),
                
                Select::make('role')
                    ->label('Rol')
                    ->options([
                        'admin' => 'Administrador',
                        'supervisor' => 'Supervisor',
                        'billing' => 'Facturación',
                    ])
                    ->required()
                    ->default('admin'),
                
                Toggle::make('status')
                    ->label('Estado')
                    ->default(true)
                    ->required(),
                
                DateTimePicker::make('email_verified_at')
                    ->label('Correo Verificado')
                    ->displayFormat('d/m/Y H:i')
                    ->nullable(),
            ]);
    }
}
