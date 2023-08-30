<?php

declare(strict_types=1);

namespace App\Models;

use App\Builders\DocumentBuilder;
use App\States\DocumentState;
use HighSolutions\EloquentSequence\Sequence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\ModelStates\HasStates;
use Spatie\Tags\HasTags;

final class Document extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, HasStates, InteractsWithMedia, LogsActivity, HasTags, Sequence;

    public const COLLECTION_NAME = 'Documents';

    public const VERSION_PROPERTY = 'version';

    protected $fillable = [
        'name',
        'description',
        'date_valid',
        'folder_id',
        'user_id',
        'group_id',
        'sequence',
        'state',
        'seedms_id',
        'public_link',
        'version',
        'is_private',
    ];

    protected $casts = [
        'date_valid' => 'datetime',
        'state' => DocumentState::class,
        'is_private' => 'boolean',
    ];

    /**
     * @return BelongsTo<User, Document>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<Group, Document>
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * @return BelongsTo<Folder, Document>
     */
    public function folder(): BelongsTo
    {
        return $this->belongsTo(Folder::class);
    }

    /**
     * @param  Builder  $query
     */
    public function newEloquentBuilder($query): DocumentBuilder
    {
        return new DocumentBuilder($query);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }

    /**
     * @return string[]
     */
    public function sequence(): array
    {
        return [
            'group' => 'folder_id',
            'fieldName' => 'sequence',
        ];
    }
}
