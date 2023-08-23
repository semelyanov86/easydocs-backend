<?php

declare(strict_types=1);

namespace App\Actions\Files;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Action;

final class FileSaverAction extends Action
{
    public function handle(string $image_64, string $prefix = ''): string
    {
        /** @var int $position */
        $position = strpos($image_64, ';');
        $extension = explode('/', explode(':', substr($image_64, 0, $position))[1])[1];   // .jpg .png .pdf
        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);
        $image = str_replace([$replace, ' '], ['', '+'], $image_64);
        $imageName = Str::random(10).'.'.$extension;
        Storage::disk('public')->put($prefix.$imageName, base64_decode($image));

        return $prefix.$imageName;
    }
}
