<?php

namespace App\Http\Livewire\AdminPanel\SchoolBusRental;

use App\Models\SchoolBusRental;
use Livewire\Component;

class SchoolBusRentalTable extends Component
{
    protected $listeners = [
        'refresh_schoolbusrental_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.school-bus-rental.school-bus-rental-table',[
            'SchoolBusRentalData' =>  SchoolBusRental::all()
        ])->with('getStatus');
    }

    public function editSchoolBusRental($SchoolBusRentalID){
        $this->emit('openSchoolBusRentalModal');
        $this->emit('editSchoolBusRentalData',$SchoolBusRentalID);
    }

    public function createSchoolBusRental(){
        $this->emit('openSchoolBusRentalModal');
    }

    public function deleteSchoolBusRental($SchoolBusRentalID){
        $this->emit('openSwalDelete',$SchoolBusRentalID);
    }

    public function DeleteData($SchoolBusRentalID){
        SchoolBusRental::destroy($SchoolBusRentalID);
        $this->emit('EmitTable');
        $this->emit('alert_delete');
    }
}
