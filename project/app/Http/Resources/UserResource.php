<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class User
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $api_token
 */
class UserResource extends JsonResource
{
   /**
    * {@inheritdoc}
    */
   public function toArray($request): array
   {
      return [
         'id' => $this->id,
         'name' => $this->name,
         'email' => $this->email,
      ];
   }
}