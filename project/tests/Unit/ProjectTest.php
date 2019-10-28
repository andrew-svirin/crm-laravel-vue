<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\Unit\traits\ProjectTrait;
use Tests\Unit\traits\UserTrait;

class ProjectTest extends TestCase
{

   use UserTrait;
   use ProjectTrait;

   public function setUp(): void
   {
      parent::setUp();
      $this->login();
   }

   /**
    * Test create project after login.
    */
   public function testPostProject()
   {
      $project = $this->createProject();
      $this->assertArrayHasKey('data', $project);
      $this->assertArrayHasKey('id', $project['data']);
   }

   /**
    * Test load multiple projects after create new one.
    */
   public function testGetProjects()
   {
      $this->createProject();
      $projects = $this->loadProjects();
      $this->assertTrue($projects['meta']['current_page'] == 1);
      $this->assertTrue($projects['meta']['total'] > 0);
      $this->assertNotEmpty($projects['data']);
   }

   /**
    * Test load project after create new one.
    */
   public function testGetProject()
   {
      $projectCreated = $this->createProject();
      $projectLoaded = $this->loadProject($projectCreated['data']['id']);
      $this->assertTrue($projectCreated['data']['id'] == $projectLoaded['data']['id']);
   }
}
