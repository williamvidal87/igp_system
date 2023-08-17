<?php

namespace App\Http\Livewire\AdminPanel\ManageReservation;

use App\Models\FacilitiesReservation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManageFacilityTable extends Component
{
    protected $listeners = [
        'refresh_schoolfacilities_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.manage-reservation.manage-facility-table',[
            'FacilitiesReservationData' =>  FacilitiesReservation::all()
        ])->with('getFacility','getStatus','getUser');
    }

    public function editFacilitiesReservation($FacilitiesReservationID){
        $this->emit('openFacilitiesReservationModal');
        $this->emit('editFacilitiesReservationData',$FacilitiesReservationID);
    }

    public function createFacilitiesReservation(){
        $this->emit('openFacilitiesReservationModal');
    }

    public function deleteFacilitiesReservation($FacilitiesReservationID){
        $this->emit('openSwalDelete',$FacilitiesReservationID);
    }

    public function DeleteData($FacilitiesReservationID){
        FacilitiesReservation::destroy($FacilitiesReservationID);
        $this->emit('EmitTable');
        $this->emit('alert_delete');
    }
}
