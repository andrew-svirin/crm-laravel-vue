<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Project
 *
 * @property int $id
 * @property string|null $status
 * @property int|null $user_id
 * @property int|null $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $user
 * @property-read Project|null $project
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectMember query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectMember whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectMember whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectMember whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectMember whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectMember whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProjectMember whereUserId($value)
 * @mixin \Eloquent
 */
class ProjectMember extends Model
{

    const STATUS_INVOICED = 'Invoiced';

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
    protected $fillable = ['id', 'project_id', 'user_id'];

    /**
     * {@inheritdoc}
     */
    protected $guarded = ['status'];

    /**
     * Get the user that owns the Membership.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the project that owns the Membership.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
