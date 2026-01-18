<?php

namespace App\Filament\Resources\Insurances\Pages;

use App\Filament\Resources\Insurances\InsuranceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInsurance extends CreateRecord
{
    protected static string $resource = InsuranceResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
