<?php

namespace Tests\Unit;

use Tests\TestCase;

class ApplicationTest extends TestCase
{

   /**
    * Test login.
    * @group l
    */
   public function testLogin()
   {
      $response = $this->postJson('/api/login', [
         'email' => 'admin@example.com',
         'password' => 'admin',
      ]);
      $content = $response->getContent();
      $data = json_decode($content);
      $this->assertObjectHasAttribute('token', $data);
   }
}
