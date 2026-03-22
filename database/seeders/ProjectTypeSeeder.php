<?php

namespace Database\Seeders;

use App\Models\ProjectType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    ProjectType::create([
      'name' => 'Web Development',
    ]);
    ProjectType::create([
      'name' => 'Mobile App Development',
    ]);
    ProjectType::create([
      'name' => 'Data Science',
    ]);
    ProjectType::create([
      'name' => 'Machine Learning',
    ]);
    ProjectType::create([
      'name' => 'DevOps',
    ]);
  }
}
