<?php

declare(strict_types=1);

namespace App\Models;

use App\IdeaStatus;
use Database\Factories\IdeaFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\ArrayObject;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Override;

/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string|null $description
 * @property ArrayObject<array-key, mixed> $links
 * @property IdeaStatus $status
 * @property string|null $image_path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Step> $steps
 * @property-read int|null $steps_count
 * @property-read User $user
 *
 * @method static IdeaFactory factory($count = null, $state = [])
 * @method static Builder<static>|Idea newModelQuery()
 * @method static Builder<static>|Idea newQuery()
 * @method static Builder<static>|Idea query()
 * @method static Builder<static>|Idea whereCreatedAt($value)
 * @method static Builder<static>|Idea whereDescription($value)
 * @method static Builder<static>|Idea whereId($value)
 * @method static Builder<static>|Idea whereImagePath($value)
 * @method static Builder<static>|Idea whereLinks($value)
 * @method static Builder<static>|Idea whereStatus($value)
 * @method static Builder<static>|Idea whereTitle($value)
 * @method static Builder<static>|Idea whereUpdatedAt($value)
 * @method static Builder<static>|Idea whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Idea extends Model
{
    /** @use HasFactory<IdeaFactory> */
    use HasFactory;

    protected $attributes = [
        'status' => IdeaStatus::PENDING,
    ];

    #[Override]
    protected function casts(): array
    {
        return [
            'links' => AsArrayObject::class,
            'status' => IdeaStatus::class,
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

    public static function statusCounts(User $user)
    {
        $statusCount = $user->ideas()->selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        // get all status cases then loop over them and return the value of the status in the $status count variable.
        // if no match is found in the $statusCount collection the set the count for that case to 0.
        return collect(IdeaStatus::cases())
            ->mapWithKeys(fn ($status) => [$status->value => $statusCount->get($status->value, 0)])
            ->put('all', Auth::user()->ideas()->count());
    }
}
