<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_post', function (Blueprint $table) {
            $table->id(); // ID tự tăng
            $table->unsignedBigInteger('id_post'); // ID bài viết
            $table->unsignedBigInteger('id_user'); // ID người dùng
            $table->text('content'); // Nội dung bình luận
            $table->decimal('donate', 10, 2)->default(0.00); // Số tiền donate, mặc định 0.00
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments_post');
    }
};
