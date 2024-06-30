<?php

namespace Codedge\MoveEntries\Actions;


use Illuminate\Support\Facades\File;
use Statamic\Actions\Action;
use Statamic\Entries\Entry;
use Statamic\Facades\Collection;


class MoveEntriesToCollection extends Action
{
    public static function title(): string
    {
        return __('Move');
    }

    public function run($items, $values): void
    {
        $collection = Collection::findByHandle($values['collection']);
        $targetDir = preg_replace('/\.' . preg_quote(pathinfo($collection->path(), PATHINFO_EXTENSION), '/') . '$/', '', $collection->path());

        /** @var \Illuminate\Support\Collection $items */
        $items->each(function (Entry $item) use ($collection, $targetDir) {
            if (File::isDirectory($targetDir) && File::isWritable($targetDir)) {
                File::move($item->path(), $targetDir . '/' . pathinfo($item->path(), PATHINFO_BASENAME));
            }
        });
    }

    protected function fieldItems(): array
    {
        return [
            'collection' => [
                'type' => 'select',
                'validate' => 'required',
                'options' => Collection::all()->flatMap(function (\Statamic\Entries\Collection $item) {
                    return [ $item->handle() => $item->title() ];
                })->sort(),
            ],
        ];
    }

    public function confirmationText(): string
    {
        /** @translation */
        return 'Are you sure you want to want to move this entry?|Are you sure you want to move these :count entries?';
    }

    public function visibleTo($item): bool
    {
        return $item instanceof Entry;
    }
}
