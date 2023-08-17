<?php

namespace App\Http\Livewire\AdminPanel\Equipment;

use App\Models\Equipment;
use Livewire\Component;

class EquipmentTable extends Component
{
    protected $listeners = [
        'refresh_equipment_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.equipment.equipment-table',[
            'EquipmentData' =>  Equipment::all()
        ])->with('getStatus');
    }

    public function editEquipment($EquipmentID){
        $this->emit('openEquipmentModal');
        $this->emit('editEquipmentData',$EquipmentID);
    }

    public function createEquipment(){
        $this->emit('openEquipmentModal');
    }

    public function deleteEquipment($EquipmentID){
        $this->emit('openSwalDelete',$EquipmentID);
    }

    public function DeleteData($EquipmentID){
        Equipment::destroy($EquipmentID);
        $this->emit('EmitTable');
        $this->emit('alert_delete');
    }
}
