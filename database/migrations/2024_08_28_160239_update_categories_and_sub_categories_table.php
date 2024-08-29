<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug')->unique()->after('title')->nullable();
        });
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->string('slug')->unique()->after('title')->nullable();
        });
    }





    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
