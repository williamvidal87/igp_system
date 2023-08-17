<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'equipment_name',
    'rate',
    'rate_description',
    'status_id'
    ];
    
    public function getStatus()
    {
        return $this->belongsTo(Status::class,'status_id');
    }
}
