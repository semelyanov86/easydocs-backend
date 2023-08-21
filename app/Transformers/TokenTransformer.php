<?php

declare(strict_types=1);

namespace App\Transformers;

use Laravel\Sanctum\NewAccessToken;
use League\Fractal\TransformerAbstract;

final class TokenTransformer extends TransformerAbstract
{
    /**
     * @return array<string, string>
     */
    public function transform(NewAccessToken $token): array
    {
        return $token->toArray();
    }
}
