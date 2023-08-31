<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Document;
use App\States\Created;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Laravel\Sanctum\Sanctum;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Tests\Traits\GenerateUserAndFolder;

final class DocumentsApiTest extends TestCase
{
    use RefreshDatabase, GenerateUserAndFolder;

    public function testCreateDocument(): void
    {
        $user = $this->generateUser();

        Sanctum::actingAs(
            $user,
            ['view-documents']
        );

        $folder = $this->generateParentFolder($user);

        $response = $this->post(route('document.store'), [
            'name' => 'Some test document',
            'description' => 'Test document description',
            'folder_id' => $folder->id,
            'fileName' => 'some',
            'tags' => ['super', 'job'],
            'file' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAApgAAAKYB3X3/OAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAANCSURBVEiJtZZPbBtFFMZ/M7ubXdtdb1xSFyeilBapySVU8h8OoFaooFSqiihIVIpQBKci6KEg9Q6H9kovIHoCIVQJJCKE1ENFjnAgcaSGC6rEnxBwA04Tx43t2FnvDAfjkNibxgHxnWb2e/u992bee7tCa00YFsffekFY+nUzFtjW0LrvjRXrCDIAaPLlW0nHL0SsZtVoaF98mLrx3pdhOqLtYPHChahZcYYO7KvPFxvRl5XPp1sN3adWiD1ZAqD6XYK1b/dvE5IWryTt2udLFedwc1+9kLp+vbbpoDh+6TklxBeAi9TL0taeWpdmZzQDry0AcO+jQ12RyohqqoYoo8RDwJrU+qXkjWtfi8Xxt58BdQuwQs9qC/afLwCw8tnQbqYAPsgxE1S6F3EAIXux2oQFKm0ihMsOF71dHYx+f3NND68ghCu1YIoePPQN1pGRABkJ6Bus96CutRZMydTl+TvuiRW1m3n0eDl0vRPcEysqdXn+jsQPsrHMquGeXEaY4Yk4wxWcY5V/9scqOMOVUFthatyTy8QyqwZ+kDURKoMWxNKr2EeqVKcTNOajqKoBgOE28U4tdQl5p5bwCw7BWquaZSzAPlwjlithJtp3pTImSqQRrb2Z8PHGigD4RZuNX6JYj6wj7O4TFLbCO/Mn/m8R+h6rYSUb3ekokRY6f/YukArN979jcW+V/S8g0eT/N3VN3kTqWbQ428m9/8k0P/1aIhF36PccEl6EhOcAUCrXKZXXWS3XKd2vc/TRBG9O5ELC17MmWubD2nKhUKZa26Ba2+D3P+4/MNCFwg59oWVeYhkzgN/JDR8deKBoD7Y+ljEjGZ0sosXVTvbc6RHirr2reNy1OXd6pJsQ+gqjk8VWFYmHrwBzW/n+uMPFiRwHB2I7ih8ciHFxIkd/3Omk5tCDV1t+2nNu5sxxpDFNx+huNhVT3/zMDz8usXC3ddaHBj1GHj/As08fwTS7Kt1HBTmyN29vdwAw+/wbwLVOJ3uAD1wi/dUH7Qei66PfyuRj4Ik9is+hglfbkbfR3cnZm7chlUWLdwmprtCohX4HUtlOcQjLYCu+fzGJH2QRKvP3UNz8bWk1qMxjGTOMThZ3kvgLI5AzFfo379UAAAAASUVORK5CYII=',
        ]);

        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson([
            'data' => [
                'id' => 1,
                'name' => 'Some test document',
                'description' => 'Test document description',
                'date_valid' => null,
                'sequence' => 1,
                'state' => 'Created',
                'state_color' => 'brown',
                'folder_id' => 1,
                'public_link' => null,
                'version' => 1,
                'media' => [
                    'data' => [
                        [
                            'type' => 'image',
                            'extension' => 'png',
                            'id' => 1,
                            'file_name' => 'some-1.png',
                            'mime_type' => 'image/png',
                            'version' => 1,
                            'order_column' => 1,
                        ],
                    ],
                ],
            ],
        ]);
        $response->assertJsonCount(2, 'data.tags.data');
        $this->assertDatabaseHas('documents', [
            'name' => 'Some test document',
            'description' => 'Test document description',
        ]);
    }

    public function testGetDocumentById(): void
    {
        $user = $this->generateUser();

        Sanctum::actingAs(
            $user,
            ['view-documents']
        );

        $folder = $this->generateParentFolder($user);
        /** @var Document $document */
        $document = Document::factory()->createOne([
            'folder_id' => $folder->id,
            'user_id' => $user->id,
            'group_id' => $user->group_id,
            'state' => Created::class,
        ]);
        $file = UploadedFile::fake()->create('somefile.docx', 13);
        $document->addMedia($file)->toMediaCollection(Document::COLLECTION_NAME);
        $media = $document->getFirstMedia(Document::COLLECTION_NAME);

        $response = $this->getJson(route('document.show', $document->id));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'data' => [
                'id' => 1,
                'name' => $document->name,
                'description' => $document->description,
                'date_valid' => $document->date_valid?->format('Y-m-d'),
                'sequence' => $document->sequence,
                'state' => $document->state->name(),
                'state_color' => $document->state->color(),
                'folder_id' => $document->folder_id,
                'public_link' => $document->public_link,
                'version' => $document->version,
                'tags' => ['data' => []],
                'media' => [
                    'data' => [
                        [
                            'type' => $media->type,
                            'extension' => $media->extension,
                            'id' => $media->id,
                            'file_name' => $media->file_name,
                            'mime_type' => $media->mime_type,
                            'version' => $media->getCustomProperty(Document::VERSION_PROPERTY),
                            'order_column' => $media->order_column,
                        ],
                    ],
                ],
            ],
        ]);
    }

    public function testGetAllDocuments(): void
    {
        $user = $this->generateUser();

        Sanctum::actingAs(
            $user,
            ['view-documents']
        );

        $folder = $this->generateParentFolder($user);
        /** @var Document $document */
        $document = Document::factory()->createOne([
            'folder_id' => $folder->id,
            'user_id' => $user->id,
            'group_id' => $user->group_id,
            'state' => Created::class,
        ]);
        $file = UploadedFile::fake()->create('somefile.docx', 13);
        $document->addMedia($file)->toMediaCollection(Document::COLLECTION_NAME);
        $media = $document->getFirstMedia(Document::COLLECTION_NAME);

        $response = $this->getJson(route('document.index'));
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'data' => [
                [
                    'id' => 1,
                    'name' => $document->name,
                    'description' => $document->description,
                    'date_valid' => $document->date_valid?->format('Y-m-d'),
                    'sequence' => $document->sequence,
                    'state' => $document->state->name(),
                    'state_color' => $document->state->color(),
                    'folder_id' => $document->folder_id,
                    'public_link' => $document->public_link,
                    'version' => $document->version,
                    'tags' => ['data' => []],
                    'media' => [
                        'data' => [
                            [
                                'type' => $media->type,
                                'extension' => $media->extension,
                                'id' => $media->id,
                                'file_name' => $media->file_name,
                                'mime_type' => $media->mime_type,
                                'version' => $media->getCustomProperty(Document::VERSION_PROPERTY),
                                'order_column' => $media->order_column,
                            ],
                        ],
                    ],
                ],
            ],
            'meta' => [
                'pagination' => [
                    'total' => 1,
                    'count' => 1,
                    'per_page' => 15,
                    'current_page' => 1,
                    'total_pages' => 1,
                ],
            ],
        ]);
    }

    public function testPaginationLinks(): void
    {
        $user = $this->generateUser();

        Sanctum::actingAs(
            $user,
            ['view-documents']
        );

        $folder = $this->generateParentFolder($user);

        Document::factory()->count(20)->create([
            'folder_id' => $folder->id,
            'user_id' => $user->id,
            'group_id' => $user->group_id,
            'state' => Created::class,
        ]);
        $response = $this->getJson(route('document.index'));
        $response->assertOk();
        $response->assertJsonCount(15, 'data');
        $response->assertSee('\/api\/v1\/documents?page=2');

        $response = $this->getJson(route('document.index', ['page' => 2]));
        $response->assertOk();
        $response->assertJsonCount(5, 'data');
        $response->assertSee('\/api\/v1\/documents?page=1');

        $response = $this->getJson(route('document.index', ['size' => 3, 'page' => 3]));
        $response->assertOk();
        $response->assertJsonCount(3, 'data');
        $response->assertSee('\/api\/v1\/documents?page=4');
    }

    public function testChangeSequenceEndpoint(): void
    {
        $user = $this->generateUser();

        Sanctum::actingAs(
            $user,
            ['view-documents']
        );

        $folder = $this->generateParentFolder($user);
        $documents = Document::factory()->count(3)->sequence([
            'folder_id' => $folder->id,
            'sequence' => 1,
            'user_id' => $user->id,
            'group_id' => $user->group_id,
        ], [
            'folder_id' => $folder->id,
            'sequence' => 2,
            'user_id' => $user->id,
            'group_id' => $user->group_id,
        ], [
            'folder_id' => $folder->id,
            'sequence' => 3,
            'user_id' => $user->id,
            'group_id' => $user->group_id,
        ])->create();
        $response = $this->patchJson(route('document.update-sequence', ['id' => $documents[2]?->id]), ['sequence' => 1]);
        $response->assertStatus(Response::HTTP_ACCEPTED);
        $response->assertJsonFragment([
            'id' => $documents[2]?->id,
            'sequence' => 2,
        ]);
        $response = $this->getJson(route('document.show', $documents[1]->id));
        $response->assertJsonFragment([
            'id' => $documents[1]?->id,
            'sequence' => 3,
        ]);
    }
}
