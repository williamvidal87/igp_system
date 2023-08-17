<?php

namespace App\Http\Livewire\ClientPanel\EquipmentReservation;

use App\Models\Equipment;
use App\Models\EquipmentReservation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EquipmentReservationForm extends Component
{
    use WithFileUploads;

    public  $data = [];
    public  $equipment_id,
            $event,
            $start,
            $end;
    public  $EquipmentReservationID;
    
    protected $listeners = ['editEquipmentReservationData'];
    
    public function render()
    {
        return view('livewire.client-panel.equipment-reservation.equipment-reservation-form',[
            'EquipmentData' =>  Equipment::where('status_id',1)->orderBy('equipment_name', 'DESC')->get()
        ]);
    }

    public function editEquipmentReservationData($EquipmentReservationID)
    {
        $this->EquipmentReservationID=$EquipmentReservationID;
        $DATA=EquipmentReservation::find($this->EquipmentReservationID);
        $this->equipment_id          = $DATA['equipment_id'];
        $this->event                = $DATA['event'];
        $this->start                = $DATA['start'];
        $this->end                  = $DATA['end'];

    }
    
    public function store()
    {
        
        $this->validate([
            'equipment_id'           => 'required',
            'event'                 => 'required',
            'start'                 => 'required',
            'end'                   => 'required',
        ]);
        
        
        $this->data = ([
            'equipment_id'           => $this->equipment_id,
            'event'                 => $this->event,
            'start'                 => $this->start,
            'end'                   => $this->end
        ]);
        //Auth::user()->
        try {
            if($this->EquipmentReservationID){
                EquipmentReservation::find($this->EquipmentReservationID)->update($this->data);
                $this->emit('alert_update');
                
            }else{
                $this->data['user_id']=Auth::user()->id;
                $this->data['status_id']=6;
                $show=EquipmentReservation::create($this->data);
                $this->emit('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeEquipmentReservationModal');
        $this->emit('refresh_schoolfacilities_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    public function closeEquipmentReservationForm(){
        $this->emit('closeEquipmentReservationModal');
        $this->emit('refresh_schoolfacilities_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
