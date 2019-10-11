<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class ApiToken manages api_token column for table users.
 * Relates to api authorization API.
 */
class ApiToken extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::table('users', function (Blueprint $table)
      {
         $table->string('api_token', 60)->after('password')
            ->unique()
            ->nullable()
            ->default(null);
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      if (Schema::hasColumn('users', 'api_token'))
      {
         Schema::table('users', function (Blueprint $table)
         {
            $table->dropColumn('api_token');
         });
      }
   }
}
