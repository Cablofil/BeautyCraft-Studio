<?php

namespace App\Filament\Resources;

use App\Enums\Sex;
use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use Filament\Forms\Components\DatePicker;
use App\Models\Clients\Client;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label(__('Coach'))                            //Beauty and Care Specialist
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable(),
                TextInput::make('first_name')
                    ->label(__('First name'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('last_name')
                    ->label(__('Last name'))
                    ->required()
                    ->maxLength(255),
                TextInput::make('middle_name')
                    ->label(__('Middle name'))
                    ->maxLength(255),
                TextInput::make('phone_number')
                    ->tel()
                    ->required()
                    ->numeric(),
                TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Select::make('sex')
                    ->required()
                    ->options(Sex::toSelect()),
                DatePicker::make('birth_date')
                    // ->format('d.m.Y')                              // TODO: fix date format
                    ->required(),
                TextInput::make('weight')
                    ->numeric(),
                TextInput::make('height')
                    ->numeric(),
                Textarea::make('info')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')
                    ->label(__('First name'))
                    ->searchable(),
                TextColumn::make('middle_name')
                    ->label(__('Middle name'))
                    ->searchable(),
                TextColumn::make('last_name')
                    ->label(__('Last name'))
                    ->searchable(),
                TextColumn::make('phone_number')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('sex')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('birth_date')
                    ->dateTime('d.m.Y')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'view' => Pages\ViewClient::route('/{record}'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
