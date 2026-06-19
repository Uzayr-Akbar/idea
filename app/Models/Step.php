<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\StepFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $description
 * @property int $completed
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Idea|null $idea
 *
 * @method static StepFactory factory($count = null, $state = [])
 * @method static Builder<static>|Step newModelQuery()
 * @method static Builder<static>|Step newQuery()
 * @method static Builder<static>|Step query()
 * @method static Builder<static>|Step whereCompleted($value)
 * @method static Builder<static>|Step whereCreatedAt($value)
 * @method static Builder<static>|Step whereDescription($value)
 * @method static Builder<static>|Step whereId($value)
 * @method static Builder<static>|Step whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Step extends Model
{
    /** @use HasFactory<StepFactory> */
    use HasFactory;

    public function idea(): BelongsTo
    {
        return $this->belongsTo(Idea::class);
    }
}
