<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolFacilities extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'facility',
    'rate',
    'rate_description',
    'max_of_pax',
    'image',
    'status_id'
    ];
    
    
    public function getStatus()
    {
        return $this->belongsTo(Status::class,'status_id');
    }
}
