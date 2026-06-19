<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use App\IdeaStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string|null $description
 * @property \Illuminate\Database\Eloquent\Casts\ArrayObject<array-key, mixed> $links
 * @property IdeaStatus $status
 * @property string|null $image_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Step> $steps
 * @property-read int|null $steps_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\IdeaFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Idea newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Idea newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Idea query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Idea whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Idea whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Idea whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Idea whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Idea whereLinks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Idea whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Idea whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Idea whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Idea whereUserId($value)
 * @mixin \Eloquent
 */
class Idea extends Model
{
    /** @use HasFactory<\Database\Factories\IdeaFactory> */
    use HasFactory;

    protected $attributes = [
        'status' => IdeaStatus::PENDING,
    ];

    protected function casts(): array
    {
        return [
            'links' => AsArrayObject::class,
            'status' => IdeaStatus::class
        ];
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function steps(): HasMany
    {
        return $this->hasMany(Step::class);
    }
    public static function statusCounts(User $user){
        $statusCount = $user->ideas()->selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');
        // get all status cases then loop over them and return the value of the status in the $status count variable.
        // if no match is found in the $statusCount collection the set the count for that case to 0.
        return collect(IdeaStatus::cases())
            ->mapWithKeys(fn($status) =>  [$status->value => $statusCount->get($status->value, 0)])
            ->put('all', Auth::user()->ideas()->count());
    }
}