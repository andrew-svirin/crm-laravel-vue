<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\Unit\traits\ProjectMemberTrait;
use Tests\Unit\traits\ProjectTrait;
use Tests\Unit\traits\UserTrait;

class ProjectMemberTest extends TestCase
{

   use UserTrait;
   use ProjectTrait;
   use ProjectMemberTrait;

   public function setUp(): void
   {
      parent::setUp();
      $this->login();
   }

   /**
    * Test invoice project member after login, create project.
    * @group test
    */
   public function testPostProjectMemberInvoice()
   {
      $project = $this->createProject();
      $user = $this->loadCurrent();
      $projectMember = $this->createProjectMember($project, $user);
      $this->assertTrue($projectMember['data']['project_id'] == $project['data']['id']);
      $this->assertTrue($projectMember['data']['user_id'] == $user['data']['id']);
   }
}
