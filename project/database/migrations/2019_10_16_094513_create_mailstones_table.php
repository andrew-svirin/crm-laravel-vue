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
         $table->bigIncrements('id');
         $table->string('title');
         $table->longText('description')->nullable();
         $table->string('status')->nullable();
         $table->integer('project_id')->nullable();
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
      Schema::dropIfExists('mailstones');
   }
}
