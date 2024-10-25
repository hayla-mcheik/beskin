<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $table='portfolios';
    protected $fillable=['service_id','description'];
    public function service()
    {
        return $this->belongsTo(Services::class);
    }
    public function portfolioImages()
    {
        return $this->hasMany(PortfolioImages::class, 'portfolio_id', 'id');
    }   
}
