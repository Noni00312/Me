<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    public $fillable = [
        'name',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'typeId');
    }
}
