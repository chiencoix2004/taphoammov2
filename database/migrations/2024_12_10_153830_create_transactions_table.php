<?php
// database/migrations/xxxx_xx_xx_create_transactions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id'); // Lưu transactionID
            $table->text('description')->nullable(); // Lưu description
            $table->string('account_name'); // Lưu accountName
            $table->decimal('amount', 15, 2); // Lưu amount
            $table->string('currency'); // Lưu currency
            $table->timestamp('transaction_date'); // Lưu transactionDate
            $table->string('type'); // Lưu type
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
}

