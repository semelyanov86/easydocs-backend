<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Group;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

final class GroupsApiTest extends TestCase
{
    use RefreshDatabase;

    public function testGetListOfGroups(): void
    {
        $user = User::factory()->createOne();
        Sanctum::actingAs(
            $user,
            ['view-documents']
        );

        $groups = Group::factory()->createMany(2);

        $response = $this->get(route('group.index'));

        $response->assertStatus(200);
        $response->assertJsonCount(2, 'data');
        $response->assertJsonFragment(['name' => $groups[0]?->name, 'description' => $groups[0]?->description]);
    }

    public function testGetGroupById(): void
    {
        $user = User::factory()->createOne();
        Sanctum::actingAs(
            $user,
            ['view-documents']
        );

        $groups = Group::factory()->createMany(2);

        $response = $this->get(route('group.show', ['id' => $groups[1]?->id]));

        $response->assertStatus(200);
        $response->assertJsonFragment(['name' => $groups[1]?->name, 'description' => $groups[1]?->description]);
    }
}
