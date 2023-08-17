<?php

namespace App\Http\Livewire\AdminPanel\ManageReservation;

use App\Models\BusReservation;
use App\Models\SchoolBusRental;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageBusView extends Component
{
    use WithFileUploads;

    public  $data = [];
    public  $name,
            $destination_id,
            $purpose,
            $start,
            $end,
            $status_id;
    public  $BusReservationID;
    public  $remark;
    
    protected $listeners = [
    'editBusReservationData',
    'RemarkData'
    ];
    
    public function RemarkData($remark,$status_id)
    {
        $this->remark=$remark;
        $this->status_id=$status_id;
    
        $this->data = ([
            'status_id'             => $this->status_id,
            'remark'                => $this->remark
        ]);
        //Auth::user()->
        try {
            if($this->BusReservationID){
                BusReservation::find($this->BusReservationID)->update($this->data);
                $this->emit('alert_update');
                
            }else{
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeBusReservationModal');
        $this->emit('refresh_schoolfacilities_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function render()
    {
        return view('livewire.admin-panel.manage-reservation.manage-bus-view',[
            'FacilityData' =>  SchoolBusRental::where('status_id',1)->get()
        ]);
    }

    public function editBusReservationData($BusReservationID)
    {
        $this->BusReservationID=$BusReservationID;
        $DATA=BusReservation::find($this->BusReservationID);
        $this->name                 = $DATA->getUser->name;
        $this->destination_id          = $DATA['destination_id'];
        $this->purpose                = $DATA['purpose'];
        $this->start                = $DATA['start'];
        $this->end                  = $DATA['end'];
        $this->status_id            = $DATA['status_id'];

    }
    
    public function approve()
    {
        
        $this->status_id=5;
        $this->emit('StatusID',$this->status_id);
        $this->emit('openRemarkModal');
    }
    
    
    public function closeBusReservationForm(){
        $this->emit('closeBusReservationModal');
        $this->emit('refresh_schoolfacilities_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    public function cancel()
    {
        
        $this->status_id=7;
        $this->emit('StatusID',$this->status_id);
        $this->emit('openRemarkModal');
    }
}
