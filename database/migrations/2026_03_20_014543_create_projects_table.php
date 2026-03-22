<?php

use App\Enums\ProjectStatus;
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
    Schema::create('projects', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->text('description')->nullable();
      $table->enum('status', array_column(ProjectStatus::cases(), 'value'))->default(ProjectStatus::NOT_STARTED->value);
      $table->integer('progress')->max(100)->default(0);
      $table->string('link')->nullable();
      $table->foreignId('typeId')->constrained('project_types');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('projects');
  }
};
