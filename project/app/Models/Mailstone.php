<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Mailstone
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $status
 * @property int|null $project_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Project|null $project
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Mailstone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Mailstone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Mailstone query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Mailstone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Mailstone whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Mailstone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Mailstone whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Mailstone whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Mailstone whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Mailstone whereUserId($value)
 * @mixin \Eloquent
 */
class Mailstone extends Model
{

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
     * {@inheritdoc}
     */
    protected $guarded = ['project_id', 'user_id'];

    /**
     * Get the project that owns the mailstone.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the user that created the mailstone.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
