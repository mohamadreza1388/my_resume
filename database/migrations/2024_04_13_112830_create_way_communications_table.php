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
        Schema::create('way_communications', function (Blueprint $table) {
            $table->id();
            $table->string("tooltip")->nullable();
            $table->string("font_icon_class")->nullable();
            $table->string("img_src");
            $table->string("title");
            $table->unsignedBigInteger("link_id");
            $table->foreign("link_id")->references("id")->on("links");
            $table->string("platform_name");
            $table->string("at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ways_communication');
    }
};
