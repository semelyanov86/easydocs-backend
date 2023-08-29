<?php

declare(strict_types=1);

namespace App\States;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class DocumentState extends State
{
    abstract public function color(): string;

    abstract public function name(): string;

    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Created::class);
    }
}
