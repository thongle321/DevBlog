<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Markdown;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Bài viết';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Nội dung chính')
                ->schema([
                    TextInput::make('title')
                        ->live(onBlur: true)
                        ->required()
                        ->minLength(1)
                        ->maxLength(150)
                        ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                            if ($operation === 'edit') {
                                return;
                            }
                            $set('slug', Str::slug($state));
                        })
                        ->label('Tiêu đề'),
                    TextInput::make('slug')->required()->minLength(1)->unique(ignoreRecord: true)->maxLength(150)->readOnly(),
                    MarkdownEditor::make('body')->required()->columnSpanFull()->label('Nội dung'),
                ])
                ->columns(1),
            Section::make('Mô tả')->schema([FileUpload::make('image')->image()->directory('posts/thumbnails')->label('Ảnh'), DatePicker::make('published_at')->displayFormat('d/m/Y')->required()->label('Ngày đăng'), Checkbox::make('featured')->label('Nổi bật'), Select::make('user_id')->relationship('author', 'name')->searchable()->required()->label('Tác giả'), Select::make('types')->multiple()->relationship('types', 'title')->searchable()->label('Loại')]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([ImageColumn::make('image')->label('Ảnh'), TextColumn::make('title')->sortable()->searchable()->label('Tiêu đề'), TextColumn::make('slug')->sortable()->searchable()->label('Nội dung'), TextColumn::make('author.name')->sortable()->searchable()->label('Tác giả'), TextColumn::make('published_at')->date('d-m-Y')->sortable()->searchable()->label('Ngày đăng'), CheckboxColumn::make('featured')->label('Nổi bật')])
            ->filters([Tables\Filters\TrashedFilter::make()])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make(), Tables\Actions\ForceDeleteBulkAction::make(), Tables\Actions\RestoreBulkAction::make()])]);
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
