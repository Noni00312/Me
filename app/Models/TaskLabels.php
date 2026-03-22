<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskLabels extends Model
{
  public $fillable = [
    'name',
  ];

  public function tasks()
  {
    return $this->hasMany(Task::class, 'labelId');
  }
}
