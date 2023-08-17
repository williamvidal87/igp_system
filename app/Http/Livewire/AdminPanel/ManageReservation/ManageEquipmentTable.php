<?php

namespace App\Http\Livewire\AdminPanel\ManageReservation;

use App\Models\EquipmentReservation;
use Livewire\Component;

class ManageEquipmentTable extends Component
{
    protected $listeners = [
        'refresh_schoolfacilities_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.manage-reservation.manage-equipment-table',[
            'EquipmentReservationData' =>  EquipmentReservation::all()
        ])->with('getEquipment','getStatus','getUser');
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
