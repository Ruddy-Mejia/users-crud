<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("certificates", function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('couse_id')
                ->constrained('courses')
                ->onDelete('cascade');
            $table->enum('status', ['initiated','in_process','observed','signing','completed']);
            $table->string('certificate_path')->nullable();
            $table->float('average')->nullable();
            $table->date('issue_date')->nullable();
            $table->integer('deposit_code')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("certificates");
    }
};
