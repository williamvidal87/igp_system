<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolBusRental extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'destination_roud_trip',
    'rate',
    'rate_description',
    'max_of_pax',
    'status_id'
    ];
    
    public function getStatus()
    {
        return $this->belongsTo(Status::class,'status_id');
    }
}
