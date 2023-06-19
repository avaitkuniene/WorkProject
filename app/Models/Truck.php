<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Truck extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_number',
        'year', 
        'notes'
    ];

    public function subunits()
    {
        return $this->hasMany(Subunit::class);
    }

    public function replacement(): BelongsToMany
    {
        return $this->belongsToMany(Subunit::class);
    }
}
