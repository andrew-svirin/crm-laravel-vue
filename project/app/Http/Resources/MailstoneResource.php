<?php

namespace App\Http\Resources;

use App\Mailstone;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class MailstoneResource
 * @mixin Mailstone
 */
class MailstoneResource extends JsonResource
{
   /**
    * {@inheritdoc}
    */
   public function toArray($request): array
   {
      return [
         'id' => $this->id,
         'title' => $this->title,
         'description' => $this->description,
      ];
   }
}