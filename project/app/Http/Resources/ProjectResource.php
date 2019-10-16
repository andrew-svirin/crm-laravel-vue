<?php

namespace App\Http\Resources;

use App\Project;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ProjectResource
 * @mixin Project
 */
class ProjectResource extends JsonResource
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
         'status' => $this->status,
         'user_id' => $this->user_id,
         'user' => UserResource::make($this->whenLoaded('user')),
         'mailstones' => MailstoneCollection::make($this->whenLoaded('mailstones')),
         'created_at' => $this->created_at,
         'updated_at' => $this->updated_at,
      ];
   }
}