<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\Collection;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @method static Collection<Folder> descendantsAndSelf(int $Id)
 *
 * @property ?int $parent_id
 */
final class Folder extends Model
{
    use SoftDeletes, HasFactory, NodeTrait, LogsActivity;

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'group_id',
        'sequence',
        'parent_id',
        'seedms_id',
        'is_private',
    ];

    /**
     * @return BelongsTo<Folder, Folder>
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }

    /**
     * @return HasMany<Document>
     */
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function isViewAllowed(int $userId, ?int $groupId): bool
    {
        if ($this->user_id === $userId) {
            return true;
        }
        if (! $this->is_private && $this->group_id === $groupId) {
            return true;
        }

        return false;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
