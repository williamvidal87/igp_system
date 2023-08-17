<?php

namespace App\Http\Livewire\ClientPanel\EquipmentReservation;

use App\Models\EquipmentReservation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EquipmentReservationTable extends Component
{
    protected $listeners = [
        'refresh_schoolfacilities_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.client-panel.equipment-reservation.equipment-reservation-table',[
            'EquipmentReservationData' =>  EquipmentReservation::where('user_id',Auth::user()->id)->get()
        ])->with('getEquipment','getStatus');
    }

    public function editEquipmentReservation($EquipmentReservationID){
        $this->emit('openEquipmentReservationModal');
        $this->emit('editEquipmentReservationData',$EquipmentReservationID);
    }

    public function createEquipmentReservation(){
        $this->emit('openEquipmentReservationModal');
    }

    public function deleteEquipmentReservation($EquipmentReservationID){
        $this->emit('openSwalDelete',$EquipmentReservationID);
    }

    public function DeleteData($EquipmentReservationID){
        EquipmentReservation::destroy($EquipmentReservationID);
        $this->emit('EmitTable');
        $this->emit('alert_delete');
    }
}
