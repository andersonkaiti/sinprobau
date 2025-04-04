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
        Schema::create("news", function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->longText("content");
            $table->mediumText("image_url")->nullable();
            $table->mediumText("image_path")->nullable();
            $table->boolean("salary_campaign")->default(false);
            $table->boolean("is_trending")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("news");
    }
};
