<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function klass()
    {
        return $this->hasOne(Klass::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
