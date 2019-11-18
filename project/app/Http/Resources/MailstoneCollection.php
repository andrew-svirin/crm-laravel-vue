<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MailstoneCollection extends ResourceCollection
{

    /**
     * {@inheritdoc}
     */
    public $collects = 'App\Http\Resources\MailstoneResource';
}