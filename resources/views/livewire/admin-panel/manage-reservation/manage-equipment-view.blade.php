<div>
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Equipment Reservation</h1>
        <button class="close" data-dismiss="modal" aria-label="Close" wire:click="closeEquipmentReservationForm"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
    
        <div class="form-group">
            <label for="name">Client Name</label>
            <input type="text" class="form-control" placeholder="name" id="name" wire:model="name" disabled>
            @error('name') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="equipment_id">Equipment</label>
            <select class="form-control" id="equipment_id" wire:model="equipment_id" disabled>
                <option>Select Facility</option>
                @foreach($EquipmentData as $data)
                    <option value="{{ $data->id }}">{{ $data->equipment_name }} {{ $data->rate }}/{{ $data->rate_description }} </option>
                @endforeach
            </select>
            @error('equipment_id') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="event">Event</label>
            <input type="text" class="form-control" placeholder="event" id="event" wire:model="event" disabled>
            @error('event') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="start">Start</label>
            <input type="datetime-local" class="form-control" id="start" name="start" wire:model="start" disabled>
            @error('start') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="end">End</label>
            <input type="datetime-local" class="form-control" id="end" name="end" wire:model="end" disabled>
            @error('end') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" wire:click="closeEquipmentReservationForm">Close</button>
        @if($this->status_id==6)
        <button class="btn btn-danger" wire:click="cancel">Set Canceled</button>
            <button class="btn btn-success" wire:click="approve">Set Recieved</button>
        @endif
    </div>
</div>
