<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titles', function (Blueprint $table) {
            $table->id(); // Tự động tạo trường id (khóa chính).
            $table->string('title'); // Trường title kiểu chuỗi.
            $table->text('content'); // Trường content kiểu text.
            $table->string('banner')->nullable(); // Trường banner kiểu chuỗi, có thể null.
            $table->timestamps(); // Tự động thêm trường created_at và updated_at.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titles');
    }
}
