<div>
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">School Bus Rental Reservation</h1>
        <button class="close" data-dismiss="modal" aria-label="Close" wire:click="closeSchoolFacilitiesForm"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
    
        <div class="form-group">
            <label for="destination_id">Place of Destination/Round Trip Rentals</label>
            <select class="form-control" id="destination_id" wire:model="destination_id">
                <option>Select</option>
                @foreach($BusData as $data)
                    <option value="{{ $data->id }}">{{ $data->destination_roud_trip }} {{ $data->rate }}/{{ $data->rate_description }} Max # of Pax: {{ $data->max_of_pax }} </option>
                @endforeach
            </select>
            @error('destination_id') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="purpose">Purpose</label>
            <input type="text" class="form-control" placeholder="purpose" id="purpose" wire:model="purpose">
            @error('purpose') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="start">Start</label>
            <input type="datetime-local" class="form-control" id="start" name="start" wire:model="start">
            @error('start') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="end">End</label>
            <input type="datetime-local" class="form-control" id="end" name="end" wire:model="end">
            @error('end') <span style="color: red">{{ $message }}</span> @enderror
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
