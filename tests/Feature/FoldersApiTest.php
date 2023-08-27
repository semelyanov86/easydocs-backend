<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Folder;
use App\Models\Group;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

final class FoldersApiTest extends TestCase
{
    use RefreshDatabase;

    protected function generateUser(): User
    {
        /** @var Group $group */
        $group = Group::factory()->createOne();

        return User::factory()->createOne([
            'group_id' => $group->id,
        ]);
    }

    protected function generateParentFolder(User $user): Folder
    {
        /** @var Folder $folder */
        $folder = Folder::factory()->createOne([
            'user_id' => $user->id,
            'group_id' => $user->group_id,
            'parent_id' => null,
        ]);

        return $folder;
    }

    public function testCreateFolder(): void
    {
        $user = $this->generateUser();

        Sanctum::actingAs(
            $user,
            ['view-folders']
        );

        $folder = $this->generateParentFolder($user);
        $response = $this->postJson(route('folder.store'), [
            'name' => 'This is folder name',
            'description' => 'This is folder Description',
            'is_private' => false,
            'parent_id' => $folder->id,
        ]);
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson([
            'data' => [
                'name' => 'This is folder name',
                'description' => 'This is folder Description',
                'user_id' => $user->id,
                'group_id' => $user->group_id,
                'is_private' => false,
                'parent_id' => $folder->id,
            ],
        ]);
        $this->assertDatabaseHas('folders', [
            'name' => 'This is folder name',
        ]);
    }

    public function testCreateFolderValidation(): void
    {
        $user = $this->generateUser();

        Sanctum::actingAs(
            $user,
            ['view-folders']
        );

        $folder = $this->generateParentFolder($user);
        $response = $this->postJson(route('folder.store'), [
            'description' => 'This is folder Description',
            'is_private' => false,
            'parent_id' => $folder->id,
        ]);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonFragment(['name' => ['The name field is required.']]);
    }

    public function testUpdateFolder(): void
    {
        $user = $this->generateUser();

        Sanctum::actingAs(
            $user,
            ['view-folders']
        );

        $parent = $this->generateParentFolder($user);
        /** @var Folder $childFolder */
        $childFolder = Folder::factory()->createOne([
            'parent_id' => $parent->id,
            'user_id' => $user->id,
            'group_id' => $user->group_id,
        ]);
        $folderArr = $childFolder->toArray();
        $folderArr['name'] = 'changed name';
        $folderArr['is_private'] = false;

        $response = $this->putJson(route('folder.update', $childFolder->id), $folderArr);
        $response->assertStatus(Response::HTTP_ACCEPTED);
        $response->assertJson([
            'data' => [
                'name' => 'changed name',
                'description' => $childFolder->description,
                'user_id' => $user->id,
                'group_id' => $user->group_id,
                'is_private' => false,
                'parent_id' => $parent->id,
            ],
        ]);
        $this->assertDatabaseHas('folders', [
            'name' => 'changed name',
        ]);
    }

    public function testGetFolderById(): void
    {
        $user = $this->generateUser();

        Sanctum::actingAs(
            $user,
            ['view-folders']
        );

        $parent = $this->generateParentFolder($user);
        /** @var Folder $childFolder */
        $childFolder = Folder::factory()->createOne([
            'parent_id' => $parent->id,
            'user_id' => $user->id,
            'group_id' => $user->group_id,
        ]);

        $response = $this->getJson(route('folder.show', ['id' => $parent->id]));
        $response->assertOk();
        $response->assertJson([
            'data' => [
                'id' => $parent->id,
                'name' => $parent->name,
                'description' => $parent->description,
                'children' => [
                    'data' => [
                        [
                            'id' => $childFolder->id,
                            'name' => $childFolder->name,
                        ],
                    ],
                ],
            ],
        ]);
    }

    public function testGetNotOwnedFolderIsForbidden(): void
    {
        $user = $this->generateUser();

        Sanctum::actingAs(
            $user,
            ['view-folders']
        );

        $testUser = $this->generateUser();

        $parent = $this->generateParentFolder($testUser);
        $response = $this->getJson(route('folder.show', ['id' => $parent->id]));
        $response->assertForbidden();
        $response->assertJsonFragment(['message' => 'You are not allowed to view this folder']);
    }

    public function testGetAllFolders(): void
    {
        $user = $this->generateUser();

        Sanctum::actingAs(
            $user,
            ['view-folders']
        );

        $parent = $this->generateParentFolder($user);
        /** @var Folder $childFolder */
        $childFolder = Folder::factory()->createOne([
            'parent_id' => $parent->id,
            'user_id' => $user->id,
            'group_id' => $user->group_id,
        ]);

        $notOwnedUser = $this->generateUser();
        Folder::factory()->createOne([
            'parent_id' => $parent->id,
            'user_id' => $notOwnedUser->id,
            'group_id' => $notOwnedUser->group_id,
        ]);

        $response = $this->getJson(route('folder.index'));
        $response->assertOk();
        $response->assertJson([
            'data' => [
                [
                    'id' => $parent->id,
                    'name' => $parent->name,
                    'description' => $parent->description,
                    'children' => [
                        'data' => [
                            [
                                'id' => $childFolder->id,
                                'name' => $childFolder->name,
                                'description' => $childFolder->description,
                            ],
                        ],
                    ],
                ],
            ],
        ]);
        $response->assertJsonCount(1, 'data.0.children.data');
    }

    public function testFolderActivities(): void
    {
        $user = $this->generateUser();

        Sanctum::actingAs(
            $user,
            ['view-folders']
        );

        $parent = $this->generateParentFolder($user);
        /** @var Folder $childFolder */
        $childFolder = Folder::factory()->createOne([
            'parent_id' => $parent->id,
            'user_id' => $user->id,
            'group_id' => $user->group_id,
        ]);
        $folderArr = $childFolder->toArray();
        $folderArr['name'] = 'name changed';
        $folderArr['is_private'] = false;

        $response = $this->putJson(route('folder.update', $childFolder->id), $folderArr);
        $response->assertStatus(Response::HTTP_ACCEPTED);

        $response = $this->getJson(route('folder.activities', $childFolder->id));
        $response->assertOk();
        $response->assertJson([
            'data' => [
                [
                    'log_name' => 'default',
                    'description' => 'created',
                    'event' => 'created',
                ],
                [
                    'log_name' => 'default',
                    'description' => 'updated',
                    'event' => 'updated',
                ],
            ],
        ]);
    }
}
