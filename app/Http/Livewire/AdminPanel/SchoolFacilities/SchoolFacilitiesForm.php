<?php

namespace App\Http\Livewire\AdminPanel\SchoolFacilities;

use App\Models\SchoolFacilities;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithFileUploads;

class SchoolFacilitiesForm extends Component
{
    use WithFileUploads;

    public  $images = [];
    public  $temp_images = [];
    public  $data = [];
    public  $facility,
            $rate,
            $rate_description,
            $max_of_pax,
            $status_id;
    public  $SchoolFacilitiesID;
    public  $edit_data=0;
    
    protected $listeners = ['editSchoolFacilitiesData'];
    
    public function render()
    {
        return view('livewire.admin-panel.school-facilities.school-facilities-form',[
            'Status_Data' =>  Status::WhereIn('id',[1,2,3])->get()
        ]);
    }

    public function editSchoolFacilitiesData($SchoolFacilitiesID)
    {
        $this->SchoolFacilitiesID=$SchoolFacilitiesID;
        $DATA=SchoolFacilities::find($this->SchoolFacilitiesID);
        $this->facility         = $DATA['facility'];
        $this->rate             = $DATA['rate'];
        $this->rate_description = $DATA['rate_description'];
        $this->max_of_pax       = $DATA['max_of_pax'];
        $this->images           = $DATA['image'];
        $this->images           = json_decode($this->images , true);
        $this->temp_images      =$this->images;
        $this->status_id        =$DATA['status_id'];
        $this->edit_data=1;

    }
    
    public function store()
    {
        
        $this->validate([
            'facility'          => 'required',
            'rate'              => 'required',
            'rate_description'  => 'required',
            'max_of_pax'        => 'required',
            'images.*'          => 'max:102400', // 1MB Max
            'status_id'         => 'required',
        ]);
        
        if($this->temp_images!=$this->images){
            foreach ($this->images as $key => $image) {
                $this->images[$key] = $image->store('images');
            }
        }
        
        $this->images = json_encode($this->images);
        
        $this->data = ([
            'facility'          => $this->facility,
            'rate'              => $this->rate,
            'rate_description'  => $this->rate_description,
            'max_of_pax'        => $this->max_of_pax,
            'image'             => $this->images,
            'status_id'         => $this->status_id
        ]);

        try {
            if($this->SchoolFacilitiesID){
                SchoolFacilities::find($this->SchoolFacilitiesID)->update($this->data);
                $this->emit('alert_update');
                
            }else{
                
                $show=SchoolFacilities::create($this->data);
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
