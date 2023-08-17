<?php

namespace App\Http\Livewire\ClientPanel\FacilitiesReservation;

use App\Models\FacilitiesReservation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FacilitiesReservationTable extends Component
{
    protected $listeners = [
        'refresh_schoolfacilities_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.client-panel.facilities-reservation.facilities-reservation-table',[
            'FacilitiesReservationData' =>  FacilitiesReservation::where('user_id',Auth::user()->id)->get()
        ])->with('getFacility','getStatus');
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
