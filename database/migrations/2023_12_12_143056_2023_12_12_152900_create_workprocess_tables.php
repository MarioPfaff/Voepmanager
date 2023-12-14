<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Core_task;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workprocesses', function (Blueprint $table) {
            $table->id();
            $table->integer('crebo');
            $table->foreignidFor(Core_task::class);
            $table->string('workprocess_number', 10);
            $table->string('workprocess_title');
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workprocesses');
        Schema::dropIfExists('core_tasks');
    }
};
