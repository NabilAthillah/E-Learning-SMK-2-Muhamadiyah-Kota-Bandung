<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-users';

    protected static ?string $navigationGroup = 'User Management';

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasPermissionTo('view all user');
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->hasPermissionTo('view all user');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make([
                    SpatieMediaLibraryFileUpload::make('avatar'),
                    Group::make([
                        TextInput::make('nomor_induk')->required()->numeric()->autocomplete('nomor_induk'),
                        TextInput::make('name')->required()->autocomplete('name'),
                        TextInput::make('email')->email()->required()->autocomplete('email'),
                        TextInput::make('password')->password()->required()->autocomplete(false),
                    ])->columns(2),
                    Group::make([
                        TextInput::make('alamat')->nullable()->autocomplete('alamat'),
                        TextInput::make('no_hp')->nullable()->autocomplete('no_hp'),
                    ])->columns(2),
                    CheckboxList::make('roles')
                        ->label('Roles')
                        ->relationship('roles', 'name')
                        ->columns(2)
                        ->required(),
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('avatar'),
                TextColumn::make('nomor_induk')->searchable(),
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('alamat')->searchable(),
                TextColumn::make('no_hp')->searchable(),
                Tables\Columns\TextColumn::make('roles.name')
                ->label('Roles')
                ->badge()
                ->separator(', '),
            ])
            ->filters([
                SelectFilter::make('roles')
                    ->label('Filter by Role')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'view' => Pages\ViewUser::route('/{record}/view'),
        ];
    }
}
