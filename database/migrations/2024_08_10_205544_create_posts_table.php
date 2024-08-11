<?php

use App\Http\Traits\AuditColumnsTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    use AuditColumnsTrait,SoftDeletes;

    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->longText('description');
            $table->json('keywords');
            $table->json('tags');
            $table->text('image');
            $table->json('references')->nullable();

            $table->tinyInteger('is_main')->default(0);
            $table->tinyInteger('is_featured')->default(0);
            $table->tinyInteger('is_popular')->default(0);
            $table->tinyInteger('status')->default(0);

            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
            $this->addAuditColumns($table);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
