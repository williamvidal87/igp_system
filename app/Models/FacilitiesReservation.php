<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilitiesReservation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'facility_id',
        'event',
        'start',
        'end',
        'status_id',
        'remark'
        ];
        
        public function getFacility()
        {
            return $this->belongsTo(SchoolFacilities::class,'facility_id');
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
