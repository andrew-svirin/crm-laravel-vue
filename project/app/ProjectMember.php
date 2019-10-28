<?php

namespace App;

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
 * @property-read \App\User|null $user
 * @property-read \App\Project|null $project
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProjectMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProjectMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProjectMember query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProjectMember whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProjectMember whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProjectMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProjectMember whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProjectMember whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProjectMember whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ProjectMember whereUserId($value)
 * @mixin \Eloquent
 */
class ProjectMember extends Model
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
      return $this->belongsTo('App\User');
   }

   /**
    * Get the project that owns the Membership.
    */
   public function project()
   {
      return $this->belongsTo('App\Project');
   }
}
