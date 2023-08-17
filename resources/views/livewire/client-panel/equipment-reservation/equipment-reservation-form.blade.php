<div>
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Equipment Reservation</h1>
        <button class="close" data-dismiss="modal" aria-label="Close" wire:click="closeEquipmentReservationForm"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
    
        <div class="form-group">
            <label for="equipment_id">Equipment</label>
            <select class="form-control" id="equipment_id" wire:model="equipment_id">
                <option>Select Equipment</option>
                @foreach($EquipmentData as $data)
                    <option value="{{ $data->id }}">{{ $data->equipment_name }} {{ $data->rate }}/{{ $data->rate_description }}</option>
                @endforeach
            </select>
            @error('equipment_id') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="event">Event</label>
            <input type="text" class="form-control" placeholder="event" id="event" wire:model="event">
            @error('event') <span style="color: red">{{ $message }}</span> @enderror
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
        <button type="button" class="btn btn-default" wire:click="closeEquipmentReservationForm">Close</button>
        @if(!empty($this->EquipmentReservationID))
            <button class="btn btn-primary" wire:click="store">Save changes</button>
        @else
            <button class="btn btn-primary" wire:click="store">Submit</button>
        @endif
    </div>
</div>
