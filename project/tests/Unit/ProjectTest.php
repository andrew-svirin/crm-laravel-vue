<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProjectTest extends TestCase
{

   private $login;

   public function setUp(): void
   {
      parent::setUp();
      $response = $this->postJson('/api/login', [
         'email' => 'admin@example.com',
         'password' => 'admin',
      ]);
      $content = $response->getContent();
      $this->login = json_decode($content, true);
   }

   /**
    * Test create project after login.
    */
   public function testPostProject(): array
   {
      $response = $this->postJson('/api/projects/create', [
         'title' => 'Some title',
         'description' => 'Some description',
         'status' => 'On Hold',
      ], [
         'Authorization' => 'Bearer ' . $this->login['api_token'],
      ]);
      $content = $response->getContent();
      $data = json_decode($content, true);
      $this->assertArrayHasKey('id', $data);
      return $data;
   }

   /**
    * Test load multiple projects after login.
    * @group test
    */
   public function testGetProjects(): array
   {
      $this->testPostProject();
      $response = $this->getJson(sprintf('/api/projects?page=%d&size=%d', 1, 5), [
         'Authorization' => 'Bearer ' . $this->login['api_token'],
      ]);
      $content = $response->getContent();
      $data = json_decode($content, true);
      $this->assertIsArray($data);
      $this->assertTrue($data['totalCount'] > 0);
      return $data;
   }
}
