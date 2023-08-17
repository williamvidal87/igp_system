<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusReservation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'destination_id',
        'purpose',
        'start',
        'end',
        'status_id',
        'remark'
        ];
        
        public function getBus()
        {
            return $this->belongsTo(SchoolBusRental::class,'destination_id');
        }
        
        public function getStatus()
        {
            return $this->belongsTo(Status::class,'status_id');
        }
        
        public function getUser()
        {
            return $this->belongsTo(User::class,'user_id');
        }
}
