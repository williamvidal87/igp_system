<?php

namespace App\Http\Livewire\DashBoard;

use App\Models\Equipment;
use App\Models\SchoolFacilities;
use App\Models\User;
use Livewire\Component;

class DashBoard extends Component
{
    public function render()
    {
        return view('livewire.dash-board.dash-board',[
            'AdminData' =>  User::all(),
            'FacilitiesData' =>  SchoolFacilities::all(),
            'EquipmentData' =>  Equipment::all()
        ]);
    }
}
