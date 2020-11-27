<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function klasses()
    {
        return $this->hasMany(Klass::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
