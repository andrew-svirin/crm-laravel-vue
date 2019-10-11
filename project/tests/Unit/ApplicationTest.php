<?php

namespace Tests\Unit;

use Tests\TestCase;

class ApplicationTest extends TestCase
{

   /**
    * Test login.
    */
   public function testLogin(): array
   {
      $response = $this->postJson('/api/login', [
         'email' => 'admin@example.com',
         'password' => 'admin',
      ]);
      $content = $response->getContent();
      $data = json_decode($content, true);
      $this->assertArrayHasKey('api_token', $data);
      return $data;
   }

   /**
    * Test get user after login.
    */
   public function testGetUser(): array
   {
      $login = $this->testLogin();
      $response = $this->getJson('/api/user', [
         'Authorization' => 'Bearer ' . $login['api_token'],
      ]);
      $content = $response->getContent();
      $data = json_decode($content, true);
      $this->assertArrayHasKey('id', $data);
      return $data;
   }

   /**
    * Test create project after login.
    */
   public function testPostProject(): array
   {
      $login = $this->testLogin();
      $response = $this->postJson('/api/projects/create', [
         'title' => 'Some title',
         'description' => 'Some description',
         'status' => 'On Hold',
      ], [
         'Authorization' => 'Bearer ' . $login['api_token'],
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
      $login = $this->testLogin();
      $response = $this->getJson(sprintf('/api/projects?page=%d&size=%d', 1, 5), [
         'Authorization' => 'Bearer ' . $login['api_token'],
      ]);
      $content = $response->getContent();
      $data = json_decode($content, true);
      $this->assertIsArray($data);
      return $data;
   }
}
