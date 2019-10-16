<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProjectsTable create projects table in the system.
 */
class CreateProjectsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('projects', function (Blueprint $table)
      {
         $table->uuid('id')->primary();
         $table->string('title')->unique();
         $table->longText('description')->nullable();
         $table->string('status')->nullable();
         $table->uuid('user_id')->nullable();
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('projects');
   }
}
