<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs() : array{
        return [
            'All' => Tab::make(),
            'Published' => Tab::make()->modifyQueryUsing(function (Builder $query){
                $query->where('published', true);
            }),
            'All' => Tab::make(),
            'Un Published' => Tab::make()->modifyQueryUsing(function (Builder $query){
                $query->where('published', false);
            }),
        ];
    }
}
