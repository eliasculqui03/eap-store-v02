<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductoResource\Pages;
use App\Filament\Resources\ProductoResource\RelationManagers;
use App\Models\Producto;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductoResource extends Resource
{
    protected static ?string $model = Producto::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $recordTitleAttribute = 'nombre';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Group::make()
                    ->schema([
                        Section::make('Información del producto')
                            ->schema([
                                Forms\Components\TextInput::make('nombre')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->maxLength(255)
                                    ->afterStateUpdated(function ($state, Set $set) {
                                        if (filled($state)) {
                                            $set('slug', Str::slug($state));
                                        }
                                    }),

                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(Producto::class, 'slug', ignoreRecord: true)
                                    ->disabled()
                                    ->dehydrated(),

                                Forms\Components\RichEditor::make('descripcion')
                                    ->fileAttachmentsDirectory('productos')
                                    ->columnSpanFull(),

                            ])
                            ->columns(2),

                        Section::make('Imagenes')
                            ->schema([
                                Forms\Components\FileUpload::make('images')
                                    ->multiple()
                                    ->directory('productos')
                                    ->maxFiles(5)
                                    ->reorderable()
                            ])
                    ])->columnSpan(2),

                Group::make()
                    ->schema([
                        Section::make('Precio')
                            ->schema([
                                Forms\Components\TextInput::make('precio')
                                    ->required()
                                    ->prefix('S/.')
                                    ->numeric(),
                            ]),

                        Section::make('Asociaciones')
                            ->schema([
                                Forms\Components\Select::make('categoria_id')
                                    ->relationship('categoria', 'nombre')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                Forms\Components\Select::make('marca_id')
                                    ->relationship('marca', 'nombre')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                            ]),

                        Section::make('Estado')
                            ->schema([
                                Forms\Components\Toggle::make('estado')
                                    ->required()
                                    ->label('Activo')
                                    ->default(true),
                                Forms\Components\Toggle::make('en_stock')
                                    ->required()
                                    ->default(true),
                                Forms\Components\Toggle::make('destacado')
                                    ->required(),
                                Forms\Components\Toggle::make('en_venta')
                                    ->required(),

                            ]),

                    ])->columnSpan(1),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('categoria.nombre')
                    ->sortable(),
                Tables\Columns\TextColumn::make('marca.nombre')
                    ->sortable(),
                Tables\Columns\TextColumn::make('precio')
                    ->money('PEN')
                    ->sortable(),
                Tables\Columns\IconColumn::make('estado')
                    ->boolean(),
                Tables\Columns\IconColumn::make('en_stock')
                    ->boolean(),
                Tables\Columns\IconColumn::make('destacado')
                    ->boolean(),
                Tables\Columns\IconColumn::make('en_venta')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Fecha de creación')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Fecha de creación')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordUrl(null)
            ->filters([
                SelectFilter::make('Categorias')
                    ->relationship('categoria', 'nombre'),
                SelectFilter::make('Marcas')
                    ->relationship('marca', 'nombre')
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
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
            'index' => Pages\ListProductos::route('/'),
            'create' => Pages\CreateProducto::route('/create'),
            'edit' => Pages\EditProducto::route('/{record}/edit'),
        ];
    }
}
