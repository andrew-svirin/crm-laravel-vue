<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMailstonesTable creates table mailstones in the system.
 */
class CreateMailstonesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('mailstones', function (Blueprint $table)
      {
         $table->uuid('id')->primary();
         $table->string('title');
         $table->longText('description')->nullable();
         $table->string('status')->nullable();
         $table->uuid('project_id');
         $table->uuid('user_id');
         $table->timestamps();
         $table->unique(['title', 'project_id']);
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('mailstones');
   }
}
