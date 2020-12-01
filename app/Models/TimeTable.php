<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    protected $table = 'timetables';

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function klass(){
        return $this->belongsTo(Klass::class);
    }
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}
