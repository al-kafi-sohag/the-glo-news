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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('status')->default(0);



            $table->softDeletes();
            $this->addAuditColumns($table);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
