<?php

namespace App;

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
 * @property-read \App\User|null $user
 * @property-read \App\Mailstone[]|null $mailstones
 * @property-read \App\ProjectMember[]|null $members
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereUserId($value)
 * @mixin \Eloquent
 */
class Project extends Model
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
      return $this->belongsTo('App\User');
   }

   /**
    * Get the mailstones those relates to the project.
    */
   public function mailstones()
   {
      return $this->hasMany('App\Mailstone');
   }

   /**
    * Get the members those relates to the project.
    */
   public function members()
   {
      return $this->hasMany('App\ProjectMember');
   }
}
