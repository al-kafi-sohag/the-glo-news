<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->boolean('is_featured')->default(0)->change();
            $table->boolean('is_latest')->default(0)->after('is_featured');
            $table->boolean('is_header')->default(0)->after('is_latest');
        });
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->boolean('is_featured')->default(0)->change();
            $table->boolean('is_latest')->default(0)->after('is_featured');
            $table->boolean('is_header')->default(0)->after('is_latest');
        });
    }


    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->tinyInteger('is_featured')->default(0)->change();
            $table->dropColumn('is_latest');
            $table->dropColumn('is_header');
        });

        Schema::table('sub_categories', function (Blueprint $table) {
            $table->tinyInteger('is_featured')->default(0)->change();
            $table->dropColumn('is_latest');
            $table->dropColumn('is_header');
        });
    }

};
