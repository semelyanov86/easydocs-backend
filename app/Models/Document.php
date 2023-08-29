<?php

declare(strict_types=1);

namespace App\Models;

use App\States\DocumentState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\ModelStates\HasStates;

final class Document extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, HasStates, InteractsWithMedia;

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
    ];

    protected $casts = [
        'date_valid' => 'datetime',
        'state' => DocumentState::class,
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
}
