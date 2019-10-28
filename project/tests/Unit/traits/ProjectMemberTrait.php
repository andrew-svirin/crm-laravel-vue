<?php

namespace Tests\Unit\traits;

use Ramsey\Uuid\Uuid;
use Tests\TestCase;

/**
 * @mixin TestCase
 * @mixin UserTrait
 */
trait ProjectMemberTrait
{

   public function createProjectMember(array $project, array $user): array
   {
      $response = $this->postJson('/api/projects/members/invoice', [
         'id' => Uuid::uuid5(Uuid::NAMESPACE_DNS, $user['data']['id'] . '-' . $project['data']['id']),
         'user_id' => $user['data']['id'],
         'project_id' => $project['data']['id'],
      ], [
         'Authorization' => 'Bearer ' . $this->login['api_token'],
      ]);
      $content = $response->getContent();
      $data = json_decode($content, true);
      return $data;
   }
}

