<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Traits\AuditColumnsTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

return new class extends Migration
{

    use AuditColumnsTrait,SoftDeletes;



    public function up()
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->tinyInteger('type');
        });
    }

    public function down()
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
