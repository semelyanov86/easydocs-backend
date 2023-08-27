<?php

declare(strict_types=1);

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Spatie\Activitylog\Models\Activity;

final class ActivityTransformer extends TransformerAbstract
{
    /** @var string[] */
    protected array $defaultIncludes = ['user'];

    /** @var string[] */
    protected array $availableIncludes = ['user'];

    /**
     * @return array<string, \Carbon\Carbon|\Illuminate\Support\Collection|int|string|null>
     */
    public function transform(Activity $activity): array
    {
        return [
            'id' => (int) $activity->id,
            'log_name' => $activity->log_name,
            'description' => $activity->description,
            'event' => $activity->event,
            'changes' => $activity->changes,
            'batch_uuid' => $activity->batch_uuid,
            'properties' => $activity->properties,
            'created_at' => $activity->created_at,
            'updated_at' => $activity->updated_at,
        ];
    }

    public function includeUser(Activity $activity): \League\Fractal\Resource\Item
    {
        return $this->item($activity->causer, new UsersTransformer());
    }
}
