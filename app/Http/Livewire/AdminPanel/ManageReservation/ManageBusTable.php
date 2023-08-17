<?php

namespace App\Http\Livewire\AdminPanel\ManageReservation;

use App\Models\BusReservation;
use Livewire\Component;

class ManageBusTable extends Component
{
    protected $listeners = [
        'refresh_schoolfacilities_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.manage-reservation.manage-bus-table',[
            'BusReservationData' =>  BusReservation::all()
        ])->with('getBus','getStatus','getUser');
    }

    public function editBusReservation($BusReservationID){
        $this->emit('openBusReservationModal');
        $this->emit('editBusReservationData',$BusReservationID);
    }

    public function createBusReservation(){
        $this->emit('openBusReservationModal');
    }

    public function deleteBusReservation($BusReservationID){
        $this->emit('openSwalDelete',$BusReservationID);
    }

    public function DeleteData($BusReservationID){
        BusReservation::destroy($BusReservationID);
        $this->emit('EmitTable');
        $this->emit('alert_delete');
    }
}
