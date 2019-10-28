<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class ProjectMemberCollection
 */
class ProjectMemberCollection extends ResourceCollection
{

   /**
    * {@inheritdoc}
    */
   public $collects = 'App\Http\Resources\ProjectMemberResource';
}