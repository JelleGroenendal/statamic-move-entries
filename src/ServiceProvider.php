<?php

declare(strict_types=1);

namespace Codedge\MoveEntries;

use Codedge\MoveEntries\Actions\MoveEntriesToCollection;
use Statamic\Providers\AddonServiceProvider;

final class ServiceProvider extends AddonServiceProvider
{
    protected $actions = [
        MoveEntriesToCollection::class,
    ];

    public function boot()
    {
        parent::boot();

        $this->publishes([
            __DIR__ . '/../config/move-entries.php' => config_path('statamic/move-entries.php'),
        ], 'move-entries-config');

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'move-entries');
    }
}
