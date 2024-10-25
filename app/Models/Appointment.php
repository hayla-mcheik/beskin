<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $table='appointments';
    protected $fillable=['name','email','phone','service_id','doctor_id','date','slot_id'];

    public function service()
    {
        return $this->belongsTo(Services::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctors::class);
    }

    public function slot()
    {
        return $this->belongsTo(DoctorsSchedule::class, 'slot_id');
    }
}
