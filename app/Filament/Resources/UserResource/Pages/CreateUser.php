<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Models\User;
use Filament\Actions;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        unset($data['updated_at']); 
        $user = static::getModel()::create([
            'name'  => $data['name'],
            'email' => $data['email'],
            'password'  => $data['password']
        ]);

        $user->employee_detail()->create([
            // 'id_user' => 100,
            'id_department' => $data['id_department'],
            'id_position' => $data['id_position'],
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            
        ]);

        // $user->department()->update([
        //     'id_department' => $data['id_department'],
        // ]);

        return $user;
    }

    // protected function handleRecordUpdate(array $data, Model $record):Model {

    // }
}
