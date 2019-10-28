<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\Unit\traits\UserTrait;

class ApplicationTest extends TestCase
{

   use UserTrait;

   public function setUp(): void
   {
      parent::setUp();
      $this->login();
   }

   /**
    * Test login.
    */
   public function testLogin()
   {
      $this->assertArrayHasKey('api_token', $this->login);
   }

   /**
    * Test get user after login.
    */
   public function testGetUser()
   {
      $user = $this->loadCurrent();
      $this->assertArrayHasKey('data', $user);
      $this->assertArrayHasKey('id', $user['data']);
   }
}
