<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klass extends Model
{
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function level(){
        return $this->belongsTo(Level::class);
    }
    public function room(){
        return $this->belongsTo(Room::class);
    }
    public function timeTables(){
        return $this->hasMany(TimeTable::class);
    }
}
