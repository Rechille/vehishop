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
        Schema::create('order', function (Blueprint $table) {
            $table->id('orderID');
            $table->timestamp('date')->now();
            $table->enum('status', ['Fully Paid', 'Partially Paid']);
            $table->integer('quantity');
            $table->double('sales_total');
            $table->enum('payment_method', ['Cash', 'E-money']);
            $table->timestamps();
        });

        Schema::table('order', function (Blueprint $table) {
            $table->unsignedBigInteger('branchID');
            $table->unsignedBigInteger('customerID');
         
            $table->foreign('customerID')->references('customerID')->on('users');
            $table->foreign('branchID')->references('branchID')->on('branch');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
