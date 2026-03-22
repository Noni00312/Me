<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $fillable = [
        'title',
        'status',
        'projectId',
        'labelId',
        'link',
        'notes',
        'timer',
    ];
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'projectId');
    }

    public function label()
    {
        return $this->belongsTo(TaskLabels::class, 'labelId');
    }
}
