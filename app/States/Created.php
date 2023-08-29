<?php

declare(strict_types=1);

namespace App\States;

final class Created extends DocumentState
{
    public function color(): string
    {
        return 'brown';
    }

    public function name(): string
    {
        return 'Created';
    }
}
