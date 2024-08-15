<?php

use App\Http\Traits\AuditColumnsTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    use AuditColumnsTrait,SoftDeletes;

    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->date('post_date');
        });
    }
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('post_date');
        });
    }
};
