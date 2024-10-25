<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = ['name', 'title', 'description', 'image', 'titleone', 'descone', 'titletwo', 'desctwo', 'titlethree', 'descthree', 'titlefour', 'descfour'];

    public function portfolio()
    {
        return $this->hasMany(Portfolio::class, 'service_id');
    }
}

