<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentReservation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'equipment_id',
        'event',
        'start',
        'end',
        'status_id',
        'remark'
        ];
        
        public function getEquipment()
        {
            return $this->belongsTo(Equipment::class,'equipment_id');
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
