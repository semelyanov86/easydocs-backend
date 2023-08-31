<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

final class PartlyUpdateDocumentRequest extends FormRequest
{
    /**
     * @return array<string, string[]>
     */
    public function rules(): array
    {
        return [
            'sequence' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return Auth::check();
    }
}
