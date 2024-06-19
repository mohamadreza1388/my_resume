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
        Schema::create('development_examples_of_work', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("development_id");
            $table->foreign("development_id")->references("id")->on("developments")->cascadeOnDelete();
            $table->unsignedBigInteger("examples_of_work_id");
            $table->foreign("examples_of_work_id")->references("id")->on("examples_of_works")->cascadeOnDelete();
            $table->unique(["development_id", "examples_of_work_id"], 'development_examples_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examples_of_works_developments');
    }
};
