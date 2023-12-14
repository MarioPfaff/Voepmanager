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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 255)->nullable(false);
            $table->text('description')->nullable();
            $table->dateTime('deadline')->nullable();
            $table->enum('status', ['Open', 'Gesloten'])->default('Open');

            $table->foreignId('author_id')->nullable()->constrained('users');
            $table->foreignId('workprocess_id')->nullable()->constrained('workprocesses');
                        
            /* Adds an archiving function to the database. */
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
        Schema::dropIfExists('user_assignment');
        Schema::dropIfExists('user_assignment_comments');
        Schema::dropIfExists('user_assignment_files');
        Schema::dropIfExists('assignment_files');
    }
};
