<?php

namespace Tests\Unit;

use Ramsey\Uuid\Uuid;
use Tests\TestCase;

class ProjectTest extends TestCase
{

   private $login;

   public function setUp(): void
   {
      parent::setUp();
      $response = $this->postJson('/api/login', [
         'email' => 'test@example.com',
         'password' => 'test',
      ]);
      $content = $response->getContent();
      $this->login = json_decode($content, true);
   }

   /**
    * Test create project after login.
    */
   public function testPostProject(): array
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
      $this->assertArrayHasKey('id', $data['data']);
      return $data;
   }

   /**
    * Test load multiple projects after create new one.
    */
   public function testGetProjects(): array
   {
      $this->testPostProject();
      $response = $this->getJson(sprintf('/api/projects?page=%d&size=%d', 1, 5), [
         'Authorization' => 'Bearer ' . $this->login['api_token'],
      ]);
      $content = $response->getContent();
      $data = json_decode($content, true);
      $this->assertTrue($data['meta']['current_page'] == 1);
      $this->assertTrue($data['meta']['total'] > 0);
      $this->assertNotEmpty($data);
      return $data;
   }

   /**
    * Test load project after create new one.
    */
   public function testGetProject()
   {
      $project = $this->testPostProject();
      $response = $this->getJson(sprintf('/api/projects/%s', $project['data']['id']), [
         'Authorization' => 'Bearer ' . $this->login['api_token'],
      ]);
      $content = $response->getContent();
      $data = json_decode($content, true);
      $this->assertTrue($data['data']['id'] == $project['data']['id']);
   }
}
