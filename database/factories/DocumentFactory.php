<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

final class DocumentFactory extends Factory
{
    protected $model = Document::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'date_valid' => Carbon::now(),
            'folder_id' => $this->faker->randomNumber(),
            'user_id' => $this->faker->randomNumber(),
            'group_id' => $this->faker->randomNumber(),
            'sequence' => $this->faker->randomNumber(),
            'state' => $this->faker->word(),
            'seedms_id' => $this->faker->randomNumber(),
            'public_link' => $this->faker->word(),
            'version' => $this->faker->randomNumber(),
            'is_private' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
