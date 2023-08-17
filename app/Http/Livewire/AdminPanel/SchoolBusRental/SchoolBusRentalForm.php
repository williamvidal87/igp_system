<?php

namespace App\Http\Livewire\AdminPanel\SchoolBusRental;

use App\Models\SchoolBusRental;
use App\Models\Status;
use Livewire\Component;

class SchoolBusRentalForm extends Component
{
    public  $data = [];
    public  $destination_roud_trip,
            $rate,
            $rate_description,
            $max_of_pax,
            $status_id;
    public  $SchoolBusRentalID;
    
    protected $listeners = ['editSchoolBusRentalData'];
    
    public function render()
    {
        return view('livewire.admin-panel.school-bus-rental.school-bus-rental-form',[
            'Status_Data' =>  Status::WhereIn('id',[1,2,3])->get()
        ]);
    }

    public function editSchoolBusRentalData($SchoolBusRentalID)
    {
        $this->SchoolBusRentalID=$SchoolBusRentalID;
        $DATA=SchoolBusRental::find($this->SchoolBusRentalID);
        $this->destination_roud_trip    = $DATA['destination_roud_trip'];
        $this->rate                     = $DATA['rate'];
        $this->rate_description         = $DATA['rate_description'];
        $this->max_of_pax               = $DATA['max_of_pax'];
        $this->status_id                = $DATA['status_id'];

    }
    
    public function store()
    {
        
        $this->validate([
            'destination_roud_trip' => 'required',
            'rate'                  => 'required',
            'rate_description'      => 'required',
            'max_of_pax'            => 'required',
            'status_id'             => 'required',
        ]);
        
        $this->data = ([
            'destination_roud_trip' => $this->destination_roud_trip,
            'rate'                  => $this->rate,
            'rate_description'      => $this->rate_description,
            'max_of_pax'            => $this->max_of_pax,
            'status_id'             => $this->status_id
        ]);

        try {
            if($this->SchoolBusRentalID){
                SchoolBusRental::find($this->SchoolBusRentalID)->update($this->data);
                $this->emit('alert_update');
                
            }else{
                
                $show=SchoolBusRental::create($this->data);
                $this->emit('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeSchoolBusRentalModal');
        $this->emit('refresh_schoolbusrental_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    public function closeSchoolBusRentalForm(){
        $this->emit('closeSchoolBusRentalModal');
        $this->emit('refresh_schoolbusrental_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
