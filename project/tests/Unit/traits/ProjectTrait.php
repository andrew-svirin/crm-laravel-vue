<?php

namespace Tests\Unit\traits;

use Ramsey\Uuid\Uuid;
use Tests\TestCase;

/**
 * @mixin TestCase
 * @mixin UserTrait
 */
trait ProjectTrait
{

   public function createProject(): array
   {
      $title = 'Some title ' . rand(1111111, 7777777);
      $response = $this->postJson('/api/projects/create', [
         'id' => Uuid::uuid5(Uuid::NAMESPACE_DNS, $title),
         'title' => $title,
         'description' => 'Some description',
         'status' => 'On Hold',
      ], [
         'Authorization' => 'Bearer ' . $this->login['api_token'],
      ]);
      $content = $response->getContent();
      $data = json_decode($content, true);
      return $data;
   }

   public function loadProject($projectId): array
   {
      $response = $this->getJson(sprintf('/api/projects/%s', $projectId), [
         'Authorization' => 'Bearer ' . $this->login['api_token'],
      ]);
      $content = $response->getContent();
      $data = json_decode($content, true);
      return $data;
   }

   public function loadProjects(): array
   {
      $response = $this->getJson(sprintf('/api/projects?page=%d&size=%d', 1, 5), [
         'Authorization' => 'Bearer ' . $this->login['api_token'],
      ]);
      $content = $response->getContent();
      $data = json_decode($content, true);
      return $data;
   }
}

