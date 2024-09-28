<?php

use App\Http\Traits\AuditColumnsTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use AuditColumnsTrait, SoftDeletes;
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();

            $table->string('title')->unique();
            $table->string('key')->unique();
            $table->json('details')->nullable();
            $table->boolean('status')->default(0);

            $table->softDeletes();
            $this->addAuditColumns($table);

            $table->timestamps();
        });
    }
};
