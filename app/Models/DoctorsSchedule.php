<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorsSchedule extends Model
{
    use HasFactory;
    protected $table='doctors_schedules';
    protected $fillable=['doctor_id','start_time','end_time','day','status'];

    public function doctors()
    {
        return $this->belongsTo(Doctors::class,'doctor_id');
    }
}

