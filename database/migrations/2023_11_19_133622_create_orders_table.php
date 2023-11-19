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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('recipient_name', 255);
            $table->integer('recipient_city');
            $table->integer('recipient_district');
            $table->text('recipient_address');
            $table->string('recipient_phone', 20);
            $table->string('recipient_email', 255)->nullable();
            $table->text('note_order')->nullable();
            $table->decimal('total_price', 10, 2);
            $table->timestamp('order_date');
            $table->tinyInteger('status')->default(0);
            $table->decimal('total_weight', 10, 2);
            $table->decimal('shipping_fee_price', 10, 2);
            $table->string('payment_method', 50);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
