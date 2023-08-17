<?php

namespace App\Http\Livewire\AdminPanel\SchoolFacilities;

use App\Models\SchoolFacilities;
use Livewire\Component;

class SchoolFacilitiesTable extends Component
{
    protected $listeners = [
        'refresh_schoolfacilities_table' => '$refresh',
        'DeleteData'
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.school-facilities.school-facilities-table',[
            'SchoolFacilitiesData' =>  SchoolFacilities::all()
        ])->with('getStatus');
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
        SchoolFacilities::destroy($SchoolFacilitiesID);
        $this->emit('EmitTable');
        $this->emit('alert_delete');
    }
}
