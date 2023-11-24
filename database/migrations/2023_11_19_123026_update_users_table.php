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
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_name', 50)->nullable()->after('id');
            $table->string('first_name', 100)->nullable()->after('id');
            $table->string('last_name', 100)->nullable()->after('id');
            $table->dropColumn('name');
            $table->integer('city')->after('id')->nullable();
            $table->integer('district')->after('id')->nullable();
            $table->text('address')->after('id')->nullable();
            $table->string('phone_number', 15)->nullable()->after('id');
            $table->tinyInteger('role')->after('id');
            $table->text('avatar')->after('id')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_name');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->string('name');
            $table->dropColumn('city');
            $table->dropColumn('district');
            $table->dropColumn('address');
            $table->dropColumn('phone_number');
            $table->dropColumn('role');
            $table->dropColumn('avatar');
        });
    }
};
