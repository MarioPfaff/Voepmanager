<?php

use App\Models\Assignment;
use App\Models\User;
use App\Models\UserAssignment;
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
        /* The pivot table for the many-to-many relationship between users and assignments. */
        Schema::create('user_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('docent_id')->constrained('users');
            $table->foreignId('student_id')->constrained('users');
            $table->foreignIdFor(Assignment::class);
            $table->text('student_answer')->nullable();
            $table->enum('phase', ['Niet ingeleverd', 'Ingeleverd, niet nagekeken', 'Nagekeken'])->default('Niet ingeleverd');
            $table->enum('progress', ['Goedgekeurd', 'Afgekeurd', 'Niet beoordeeld'])->default('Niet beoordeeld');
            $table->timestamps();
        });

        /* Comments that are specifically on the submission of the student, private comments. */
        Schema::create('assignment_comments', function (Blueprint $table) {
            $table->timestamps();
            $table->id();
    
            $table->foreignIdFor(UserAssignment::class);
            $table->foreignIdFor(User::class);
            // $table->enum('role', ['Docent', 'Student', 'Stagebegeleider']);
            $table->text('comment');
        });

        /* Files that are specifically on the submission of the student, private files. */
        Schema::create('user_assignment_files', function (Blueprint $table) {
            $table->timestamps();
            $table->id();

            $table->foreignIdFor(UserAssignment::class);
            $table->text('file_path');
        });

        /* Files that are specifically on the assignment itself, global files. */
        Schema::create('assignment_files', function (Blueprint $table) {
            $table->timestamps();
            $table->id();

            $table->foreignIdFor(Assignment::class);
            $table->text('file_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_assignments');
        Schema::dropIfExists('assignment_comments');
        Schema::dropIfExists('user_assignment_files');
        Schema::dropIfExists('assignment_files');

    }
};
