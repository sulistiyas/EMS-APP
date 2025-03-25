<?php

namespace App\Filament\Resources\LeaveBalanceResource\Pages;

use App\Filament\Resources\LeaveBalanceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLeaveBalance extends EditRecord
{
    protected static string $resource = LeaveBalanceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
