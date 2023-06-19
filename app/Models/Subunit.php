<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subunit extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_truck',
        'subunit', 
        'start_date',
        'end_date'
    ];

    public function mainTruck() 
    {
        return $this->belongsTo(Truck::class);
    }

    public function subunit() 
    {
        return $this->belongsTo(Truck::class);
    }
}
