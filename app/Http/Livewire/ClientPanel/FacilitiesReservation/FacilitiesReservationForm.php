<?php

namespace App\Http\Livewire\ClientPanel\FacilitiesReservation;

use App\Models\FacilitiesReservation;
use App\Models\SchoolFacilities;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class FacilitiesReservationForm extends Component
{
    use WithFileUploads;

    public  $data = [];
    public  $facility_id,
            $event,
            $start,
            $end;
    public  $FacilitiesReservationID;
    
    protected $listeners = ['editFacilitiesReservationData'];
    
    public function render()
    {
        return view('livewire.client-panel.facilities-reservation.facilities-reservation-form',[
            'FacilityData' =>  SchoolFacilities::where('status_id',1)->get()
        ]);
    }

    public function editFacilitiesReservationData($FacilitiesReservationID)
    {
        $this->FacilitiesReservationID=$FacilitiesReservationID;
        $DATA=FacilitiesReservation::find($this->FacilitiesReservationID);
        $this->facility_id          = $DATA['facility_id'];
        $this->event                = $DATA['event'];
        $this->start                = $DATA['start'];
        $this->end                  = $DATA['end'];

    }
    
    public function store()
    {
        
        $this->validate([
            'facility_id'           => 'required',
            'event'                 => 'required',
            'start'                 => 'required',
            'end'                   => 'required',
        ]);
        
        
        $this->data = ([
            'facility_id'           => $this->facility_id,
            'event'                 => $this->event,
            'start'                 => $this->start,
            'end'                   => $this->end
        ]);
        //Auth::user()->
        try {
            if($this->FacilitiesReservationID){
                FacilitiesReservation::find($this->FacilitiesReservationID)->update($this->data);
                $this->emit('alert_update');
                
            }else{
                $this->data['user_id']=Auth::user()->id;
                $this->data['status_id']=6;
                $show=FacilitiesReservation::create($this->data);
                $this->emit('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeFacilitiesReservationModal');
        $this->emit('refresh_schoolfacilities_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    public function closeFacilitiesReservationForm(){
        $this->emit('closeFacilitiesReservationModal');
        $this->emit('refresh_schoolfacilities_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
