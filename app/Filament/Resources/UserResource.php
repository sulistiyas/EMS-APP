<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Position;
use Filament\Forms\Form;
use App\Models\Department;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Users';

    protected static ?string $modelLabel = 'User';

    protected static ?string $navigationGroup = 'User Management';

    protected static ?string $slug = 'user';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            // Forms\Components\TextInput::make('id_user')
            //     ->required()
            //     ->numeric(),
            Forms\Components\Section::make('User Information')
                ->description('Employee Name, Address & Phone Number')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('phone')
                        ->numeric()
                        ->required()
                        ->maxLength(12),
                    Forms\Components\Textarea::make('address')
                        ->required()
                        ->maxLength(255)
                        ->autosize(),
                ])->columns(2),
            Forms\Components\Section::make('User Office Information')
                ->description('Employee Department & Position')
                ->schema([
                    Forms\Components\Select::make('id_department')
                        ->label('Department')
                        ->searchable()
                        ->preload()
                        ->live()
                        ->required()
                        ->options(Department::all()->pluck('name', 'id_department')),
                    Forms\Components\Select::make('id_position')
                        ->options(fn (Get $get):Collection => Position::query()
                            ->where('id_department', $get('id_department'))
                            ->pluck('name', 'id_position'))
                        ->label('Position')
                        ->searchable()
                        ->preload()
                        ->live()
                        ->required(),
                        

                ])->columns(2),
            Forms\Components\Section::make('User Login Details')
                ->description('Employee Login Detail')
                ->schema([
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('password')
                        ->password()
                        ->required()
                        ->maxLength(255),
                ])->columns(2),
        ]);
    }

    // public static function afterCreate(Model $record, array $data):void
    // {
    //     $record->employee_detail()->create([
    //         'id_user'   => $data['id'],
    //         'name'      => $data['name'],
    //         'phone'     => $data['phone'],
    //         'address'     => $data['address'],
    //         'position'     => $data['position'],
    //         'department'     => $data['department'],
    //     ]);
    // }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('employee_detail.phone')
                    ->label('Phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('employee_detail.address')
                    ->label('Address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('employee_detail.department.name')
                    ->label('Department')
                    ->searchable(),
                Tables\Columns\TextColumn::make('employee_detail.position.name')
                    ->label('Position')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            // 'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
