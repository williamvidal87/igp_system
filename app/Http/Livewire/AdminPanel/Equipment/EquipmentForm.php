<?php

namespace App\Http\Livewire\AdminPanel\Equipment;

use App\Models\Equipment;
use App\Models\Status;
use Livewire\Component;

class EquipmentForm extends Component
{
    public  $data = [];
    public  $equipment_name,
            $rate,
            $rate_description,
            $max_of_pax,
            $status_id;
    public  $EquipmentID;
    
    protected $listeners = ['editEquipmentData'];
    
    public function render()
    {
        return view('livewire.admin-panel.equipment.equipment-form',[
            'Status_Data' =>  Status::WhereIn('id',[1,2,4])->get()
        ]);
    }

    public function editEquipmentData($EquipmentID)
    {
        $this->EquipmentID=$EquipmentID;
        $DATA=Equipment::find($this->EquipmentID);
        $this->equipment_name   = $DATA['equipment_name'];
        $this->rate             = $DATA['rate'];
        $this->rate_description = $DATA['rate_description'];
        $this->status_id        = $DATA['status_id'];

    }
    
    public function store()
    {
        
        $this->validate([
            'equipment_name'    => 'required',
            'rate'              => 'required',
            'rate_description'  => 'required',
            'status_id'         => 'required'
        ]);
        
        $this->data = ([
            'equipment_name'    => $this->equipment_name,
            'rate'              => $this->rate,
            'rate_description'  => $this->rate_description,
            'status_id'         => $this->status_id
        ]);

        try {
            if($this->EquipmentID){
                Equipment::find($this->EquipmentID)->update($this->data);
                $this->emit('alert_update');
                
            }else{
                
                $show=Equipment::create($this->data);
                $this->emit('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeEquipmentModal');
        $this->emit('refresh_equipment_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    public function closeEquipmentForm(){
        $this->emit('closeEquipmentModal');
        $this->emit('refresh_equipment_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
