<?php

namespace Database\Factories;

use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProjectType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $projectType = ProjectType::all();

    return [
      'title' => $this->faker->sentence(),
      'description' => $this->faker->paragraph(),
      'status' => $this->faker->randomElement(ProjectStatus::cases())->value,
      'progress' => $this->faker->numberBetween(0, 100),
      'link' => $this->faker->url(),
      'typeId' => $this->faker->randomElement($projectType->pluck('id')->toArray()),
    ];
  }
}
