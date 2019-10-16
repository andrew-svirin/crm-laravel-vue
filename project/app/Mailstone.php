<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Mailstone
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $status
 * @property int|null $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Project|null $project
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mailstone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mailstone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mailstone query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mailstone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mailstone whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mailstone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mailstone whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mailstone whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mailstone whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mailstone whereUserId($value)
 * @mixin \Eloquent
 */
class Mailstone extends Model
{

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      'title', 'description', 'status',
   ];

   /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
   protected $guarded = ['project_id'];

   /**
    * Get the project that owns the mailstone.
    */
   public function project()
   {
      return $this->belongsTo('App\Project');
   }
}
