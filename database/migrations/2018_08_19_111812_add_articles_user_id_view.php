<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArticlesUserIdView extends Migration
{

    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('view')->default(0);
        });
    }


    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
             $table->dropColumn('user_id');
             $table->dropColumn('view');
        });
    }
}
