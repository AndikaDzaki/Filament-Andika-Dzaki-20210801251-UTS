<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuditResource\Pages;
use App\Models\Audit;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AuditResource extends Resource
{
    protected static ?string $model = Audit::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Audit';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('user.email')
                ->label('User Email')
                ->sortable()
                ->searchable()
                 ->formatStateUsing(fn ($state, $record) => $record->user?->email ?? '—'),

                Tables\Columns\TextColumn::make('event')->label('Event')->sortable(),
                Tables\Columns\TextColumn::make('auditable_type')->label('Model')->sortable()->wrap(),
                Tables\Columns\TextColumn::make('auditable_id')->label('Model ID')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Tanggal')->dateTime()->sortable(),


                Tables\Columns\TextColumn::make('old_values')
                    ->label('Old Values')
                    ->limit(50)
                    ->formatStateUsing(fn ($state) => json_encode($state, JSON_PRETTY_PRINT)),
                Tables\Columns\TextColumn::make('new_values')
                    ->label('New Values')
                    ->limit(50)
                    ->formatStateUsing(fn ($state) => json_encode($state, JSON_PRETTY_PRINT)),
            ])
            ->filters([
                //
            ])
            ->actions([

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAudits::route('/'),

        ];
    }
}
