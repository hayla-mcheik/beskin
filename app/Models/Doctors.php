<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;
    protected $table='doctors';
    protected $fillable=['name','title','desc','fb','insta','whatsapp','skills','education','image','imgone','imgtwo'];
}