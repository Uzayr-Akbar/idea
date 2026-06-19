<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Idea;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $description
 * @property int $completed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Idea|null $idea
 * @method static \Database\Factories\StepFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Step newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Step newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Step query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Step whereCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Step whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Step whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Step whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Step whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Step extends Model
{
    /** @use HasFactory<\Database\Factories\StepFactory> */
    use HasFactory;

    public function idea(): BelongsTo
    {
        return $this->belongsTo(Idea::class);
    }
}
