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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Khóa chính tự tăng
            $table->string('title'); // Tiêu đề bài viết
            $table->text('content'); // Nội dung bài viết
            $table->unsignedBigInteger('id_user'); // ID người dùng (không ràng buộc khóa ngoại)
            $table->string('status')->default('1'); // Trạng thái
            $table->integer('view')->default(0); // Lượt xem
            $table->string('image')->nullable(); // Đường dẫn ảnh
            $table->string('category'); // Danh mục
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
        Schema::dropIfExists('posts'); // Xóa bảng khi rollback
    }
};
