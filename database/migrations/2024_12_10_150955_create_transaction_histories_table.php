<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_histories', function (Blueprint $table) {
            $table->id(); // ID tự tăng
            $table->string('transaction_id')->unique(); // Mã giao dịch, unique để tránh trùng lặp
            $table->string('account_number'); // Số tài khoản liên quan
            $table->decimal('amount', 15, 2); // Số tiền giao dịch
            $table->timestamp('transaction_time'); // Thời gian giao dịch
            $table->string('description')->nullable(); // Mô tả giao dịch
            $table->timestamps(); // Tự động thêm created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_histories');
    }
}
