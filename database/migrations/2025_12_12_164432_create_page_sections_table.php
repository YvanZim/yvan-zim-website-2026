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
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->string('title');
            $table->longText('content')->nullable();
            $table->string('template_id')->default('TwoColumns');
            $table->string('image')->nullable();
            $table->string('button')->nullable();
            $table->string('link')->nullable();
            $table->string('payment_title')->nullable();
            $table->boolean('payment_donation')->default(false);
            $table->double('payment_price', 8, 2)->default(5.00);
            $table->double('payment_donation_default', 8, 2)->default(5.00);
            $table->boolean('payment_name')->default(false);
            $table->boolean('payment_message')->default(false);
            $table->string('payment_group')->nullable();
            $table->string('payment_redirect')->nullable();
            $table->boolean('page_title')->default(false);
            $table->string('location')->nullable();
            $table->longText('content_two')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_sections');
    }
};
