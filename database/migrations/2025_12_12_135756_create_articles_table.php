<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('meta_description')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->longText('content');
            $table->date('date')->nullable();
            $table->string('lang')->default('en');
            $table->integer('map')->nullable();
            $table->timestamps();
            $table->boolean('no_index')->default(false);
            $table->integer('type')->default(0);
            $table->string('external_content')->nullable();
            $table->string('button_txt')->nullable();
            $table->string('button_link')->nullable();
            $table->boolean('expired')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
