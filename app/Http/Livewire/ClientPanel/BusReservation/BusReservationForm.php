<?php

namespace App\Http\Livewire\ClientPanel\BusReservation;

use App\Models\BusReservation;
use App\Models\SchoolBusRental;
use App\Models\SchoolFacilities;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class BusReservationForm extends Component
{
    use WithFileUploads;

    public  $data = [];
    public  $destination_id,
            $purpose,
            $start,
            $end;
    public  $SchoolFacilitiesID;
    
    protected $listeners = ['editSchoolFacilitiesData'];
    
    public function render()
    {
        return view('livewire.client-panel.bus-reservation.bus-reservation-form',[
            'BusData' =>  SchoolBusRental::where('status_id',1)->orderBy('destination_roud_trip', 'DESC')->get()
        ]);
    }

    public function editSchoolFacilitiesData($SchoolFacilitiesID)
    {
        $this->SchoolFacilitiesID=$SchoolFacilitiesID;
        $DATA=BusReservation::find($this->SchoolFacilitiesID);
        $this->destination_id          = $DATA['destination_id'];
        $this->purpose                = $DATA['purpose'];
        $this->start                = $DATA['start'];
        $this->end                  = $DATA['end'];

    }
    
    public function store()
    {
        
        $this->validate([
            'destination_id'           => 'required',
            'purpose'                 => 'required',
            'start'                 => 'required',
            'end'                   => 'required',
        ]);
        
        
        $this->data = ([
            'destination_id'           => $this->destination_id,
            'purpose'                 => $this->purpose,
            'start'                 => $this->start,
            'end'                   => $this->end
        ]);
        //Auth::user()->
        try {
            if($this->SchoolFacilitiesID){
                BusReservation::find($this->SchoolFacilitiesID)->update($this->data);
                $this->emit('alert_update');
                
            }else{
                $this->data['user_id']=Auth::user()->id;
                $this->data['status_id']=6;
                $show=BusReservation::create($this->data);
                $this->emit('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeSchoolFacilitiesModal');
        $this->emit('refresh_schoolfacilities_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    public function closeSchoolFacilitiesForm(){
        $this->emit('closeSchoolFacilitiesModal');
        $this->emit('refresh_schoolfacilities_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
