<?php

namespace App\Http\Livewire\AdminPanel\ManageReservation;

use App\Models\FacilitiesReservation;
use App\Models\SchoolFacilities;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageFacilityView extends Component
{
    use WithFileUploads;

    public  $data = [];
    public  $name,
            $facility_id,
            $event,
            $start,
            $end,
            $status_id;
    public  $FacilitiesReservationID;
    public  $remark;
    
    protected $listeners = [
    'editFacilitiesReservationData',
    'RemarkData',
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
            if($this->FacilitiesReservationID){
                FacilitiesReservation::find($this->FacilitiesReservationID)->update($this->data);
                $this->emit('alert_update');
                
            }else{
                
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
    
    public function render()
    {
        return view('livewire.admin-panel.manage-reservation.manage-facility-view',[
            'FacilityData' =>  SchoolFacilities::where('status_id',1)->get()
        ]);
    }

    public function editFacilitiesReservationData($FacilitiesReservationID)
    {
        $this->FacilitiesReservationID=$FacilitiesReservationID;
        $DATA=FacilitiesReservation::find($this->FacilitiesReservationID);
        $this->name                 = $DATA->getUser->name;
        $this->facility_id          = $DATA['facility_id'];
        $this->event                = $DATA['event'];
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
    
    
    public function closeFacilitiesReservationForm(){
        $this->emit('closeFacilitiesReservationModal');
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
