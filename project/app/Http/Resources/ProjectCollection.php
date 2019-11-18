<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectCollection extends ResourceCollection
{

    /**
     * {@inheritdoc}
     */
    public $collects = 'App\Http\Resources\ProjectResource';
}