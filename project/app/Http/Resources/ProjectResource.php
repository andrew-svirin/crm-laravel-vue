<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Project
 * @package App\Http\Resources
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $status
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User|null $user
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
         'created_at' => $this->created_at,
         'updated_at' => $this->updated_at,
      ];
   }
}