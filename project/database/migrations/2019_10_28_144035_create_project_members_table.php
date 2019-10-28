<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectMembersTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('project_members', function (Blueprint $table)
      {
         $table->uuid('id')->primary();
         $table->uuid('user_id');
         $table->uuid('project_id');
         $table->string('status')->nullable();
         $table->timestamps();
         $table->unique(['user_id', 'project_id']);
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('project_members');
   }
}
