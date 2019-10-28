<?php

namespace Tests\Unit\traits;

use Tests\TestCase;

/**
 * @mixin TestCase
 */
trait UserTrait
{

   /**
    * @var array
    */
   public $login;

   public function login()
   {
      $response = $this->postJson('/api/login', [
         'email' => 'test@example.com',
         'password' => 'test',
      ]);
      $content = $response->getContent();
      $this->login = json_decode($content, true);
   }

   public function loadCurrent(): array
   {
      $response = $this->getJson('/api/user', [
         'Authorization' => 'Bearer ' . $this->login['api_token'],
      ]);
      $content = $response->getContent();
      $data = json_decode($content, true);
      return $data;
   }
}

