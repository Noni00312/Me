<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\TaskStatus;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('tasks', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->enum('status', array_column(TaskStatus::cases(), 'value'))->default(TaskStatus::TODO->value);
      $table->foreignId('projectId')->constrained('projects');
      $table->foreignId('labelId')->constrained('task_labels');
      $table->string('link')->nullable();
      $table->text('notes')->nullable();
      $table->string('timer');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('tasks');
  }
};
