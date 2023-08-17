<div>
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">School Facilities</h1>
        <button class="close" data-dismiss="modal" aria-label="Close" wire:click="closeSchoolFacilitiesForm"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
    
        <div class="form-group">
            <label for="facility">Facility</label>
            <input type="text" class="form-control" placeholder="Facility" id="facility" wire:model="facility">
            @error('facility') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="rate">Rate</label>
            <input type="number" class="form-control" placeholder="Rate" id="rate" wire:model="rate" onkeypress='return event.charCode >= 46 && event.charCode <= 57'>
            @error('rate') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="rate_description">Rate Description</label>
            <input type="text" class="form-control" placeholder="Rate Description" id="rate_description" wire:model="rate_description">
            @error('rate_description') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="max_of_pax">Max # of Pax</label>
            <input type="number" class="form-control" placeholder="Max # of Pax" id="max_of_pax" wire:model="max_of_pax">
            @error('max_of_pax') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="status_id">Status</label>
            <select class="form-control" id="status_id" wire:model="status_id">
                <option>Select Status</option>
                @foreach($Status_Data as $data)
                    <option value="{{ $data->id }}">{{ $data->status }}</option>
                @endforeach
            </select>
            @error('status_id') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        
        <label for="images"><strong>Upload Image</strong>(<small>Optional</small>)</label>
        <div class="form-group">
            Photo Preview:
            @foreach ($this->images as $image)
            @endforeach
            <div class="row">
                @foreach ($this->images as $image)
                @endforeach
                @if($this->edit_data==1)
                    @foreach ($this->images as $image)
                        <div class="col-sm-2">
                            @if($this->temp_images==$this->images)
                                <a href="/storage/{{ $image }}" alt="Image View" target="_blank">
                                <img style="width: 0.80in;height:0.80in" src="/storage/{{ $image }}"></a>
                            @else
                                <img style="width: 0.80in;height:0.80in" src="{{ $image->temporaryUrl() }}">
                            @endif
                        </div>
                    @endforeach
                @else
                    @foreach ($this->images as $image)
                        <div class="col-sm-2">
                            <img style="width: 0.80in;height:0.80in" src="{{ $image->temporaryUrl() }}">
                        </div>
                    @endforeach
                @endif
            </div>
            
            <div class="mb-3">
                <input type="file" id="images" class="form-control" wire:model="images" multiple accept="image/*">
                <div wire:loading wire:target="images">Uploading...</div>
                @error('images.*') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" wire:click="closeSchoolFacilitiesForm">Close</button>
        @if(!empty($this->SchoolFacilitiesID))
            <button class="btn btn-primary" wire:click="store">Save changes</button>
        @else
            <button class="btn btn-primary" wire:click="store">Submit</button>
        @endif
    </div>
</div>
