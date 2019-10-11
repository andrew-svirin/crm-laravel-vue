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
}
