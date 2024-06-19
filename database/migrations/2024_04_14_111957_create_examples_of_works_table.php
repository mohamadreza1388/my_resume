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
        Schema::create('examples_of_works', function (Blueprint $table) {
            $table->id();
            $table->string("img_src");
            $table->string("work_title");
            $table->string("url_address");
            $table->string("information_title");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examples_of_works');
    }
};
