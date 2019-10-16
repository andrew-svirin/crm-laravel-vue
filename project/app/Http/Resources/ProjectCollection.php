<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectCollection extends ResourceCollection
{
   /**
    * The resource that this resource collects.
    *
    * @var string
    */
   public $collects = 'App\Http\Resources\ProjectResource';
}