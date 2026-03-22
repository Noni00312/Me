<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  use HasFactory;

  #[UseFactory(ProjectFactory::class)]
  public $fillable = [
    'title',
    'description',
    'status',
    'progress',
    'link',
    'typeId',
  ];

  public function type()
  {
    return $this->belongsTo(ProjectType::class, 'typeId');
  }

  public function tasks()
  {
    return $this->hasMany(Task::class, 'projectId');
  }
}
