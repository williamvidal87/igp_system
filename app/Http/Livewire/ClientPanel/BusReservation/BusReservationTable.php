<?php

namespace App\Http\Livewire\ClientPanel\BusReservation;

use App\Models\BusReservation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BusReservationTable extends Component
{
    protected $listeners = [
        'refresh_schoolfacilities_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.client-panel.bus-reservation.bus-reservation-table',[
            'SchoolFacilitiesData' =>  BusReservation::where('user_id',Auth::user()->id)->get()
        ])->with('getBus','getStatus');
    }

    public function editSchoolFacilities($SchoolFacilitiesID){
        $this->emit('openSchoolFacilitiesModal');
        $this->emit('editSchoolFacilitiesData',$SchoolFacilitiesID);
    }

    public function createSchoolFacilities(){
        $this->emit('openSchoolFacilitiesModal');
    }

    public function deleteSchoolFacilities($SchoolFacilitiesID){
        $this->emit('openSwalDelete',$SchoolFacilitiesID);
    }

    public function DeleteData($SchoolFacilitiesID){
        BusReservation::destroy($SchoolFacilitiesID);
        $this->emit('EmitTable');
        $this->emit('alert_delete');
    }
}
