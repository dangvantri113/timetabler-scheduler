<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function teachers(){
        return $this->belongsToMany(Teacher::class);
    }
    public function subjectLevels(){
        return $this->hasMany(SubjectLevel::class);
    }
}
