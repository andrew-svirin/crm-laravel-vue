<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Project
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $status
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $user
 * @property-read Mailstone[]|null $mailstones
 * @property-read ProjectMember[]|null $members
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereUserId($value)
 * @mixin \Eloquent
 */
class Project extends Model
{

    const STATUS_ON_DEVELOP = 'On Development';
    const STATUS_ON_ESTIMATE = 'On Estimate';
    const STATUS_ON_HOLD = 'On Hold';

    /**
     * {@inheritdoc}
     */
    protected $keyType = 'uuid';

    /**
     * {@inheritdoc}
     */
    public $incrementing = false;

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'id', 'title', 'description', 'status',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['user_id'];

    /**
     * Get the user that owns the project.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the mailstones those relates to the project.
     */
    public function mailstones()
    {
        return $this->hasMany(Mailstone::class);
    }

    /**
     * Get the members those relates to the project.
     */
    public function members()
    {
        return $this->hasMany(ProjectMember::class);
    }
}
