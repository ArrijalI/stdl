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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->required();
            $table->date('due_date')->required();
            $table->time('due_time')->required();
            $table->string('priority')->required();
            $table->unsignedBigInteger('category_id')->required();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict'); //foreign key
            $table->text('description')->required();
            $table->string('status')->required();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropForeign(['category_id']);
        Schema::dropIfExists('tasks');
    }
};
