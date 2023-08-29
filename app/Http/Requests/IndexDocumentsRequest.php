<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class IndexDocumentsRequest extends FormRequest
{
    /**
     * @return array<string, string[]>
     */
    public function rules(): array
    {
        return [
            'page' => ['integer', 'nullable'],
            'size' => ['integer', 'nullable'],
        ];
    }

    public function authorize(): bool
    {
        return \Auth::check();
    }
}
