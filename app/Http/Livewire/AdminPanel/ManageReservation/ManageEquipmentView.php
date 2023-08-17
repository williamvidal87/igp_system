<?php

namespace App\Http\Livewire\AdminPanel\ManageReservation;

use App\Models\Equipment;
use App\Models\EquipmentReservation;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageEquipmentView extends Component
{
    use WithFileUploads;

    public  $data = [];
    public  $name,
            $equipment_id,
            $event,
            $start,
            $end,
            $status_id;
    public  $EquipmentReservationID;
    public  $remark;
    
    protected $listeners = [
    'editEquipmentReservationData',
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
            if($this->EquipmentReservationID){
                EquipmentReservation::find($this->EquipmentReservationID)->update($this->data);
                $this->emit('alert_update');
                
            }else{
                
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
    
    public function render()
    {
        return view('livewire.admin-panel.manage-reservation.manage-equipment-view',[
            'EquipmentData' =>  Equipment::where('status_id',1)->get()
        ]);
    }

    public function editEquipmentReservationData($EquipmentReservationID)
    {
        $this->EquipmentReservationID=$EquipmentReservationID;
        $DATA=EquipmentReservation::find($this->EquipmentReservationID);
        $this->name                 = $DATA->getUser->name;
        $this->equipment_id         = $DATA['equipment_id'];
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
    
    
    public function closeEquipmentReservationForm(){
        $this->emit('closeEquipmentReservationModal');
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
