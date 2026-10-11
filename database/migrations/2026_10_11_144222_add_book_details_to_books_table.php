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
        Schema::table('books', function (Blueprint $table) {
            $table->unsignedSmallInteger('year')->nullable()->after('title');
            $table->string('category')->nullable()->after('year');
            $table->text('description')->nullable()->after('category');
            $table->boolean('is_available')->default(false)->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn(['year', 'category', 'description', 'is_available']);
        });
    }
};
