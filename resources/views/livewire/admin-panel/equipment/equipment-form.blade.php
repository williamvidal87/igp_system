<div>
    <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Equipment</h1>
        <button class="close" data-dismiss="modal" aria-label="Close" wire:click="closeEquipmentForm"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
    
        <div class="form-group">
            <label for="equipment_name">Equipment Name</label>
            <input type="text" class="form-control" placeholder="Equipment Name" id="equipment_name" wire:model="equipment_name">
            @error('equipment_name') <span style="color: red">{{ $message }}</span> @enderror
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
            <label for="status_id">Status</label>
            <select class="form-control" id="status_id" wire:model="status_id">
                <option>Select Status</option>
                @foreach($Status_Data as $data)
                    <option value="{{ $data->id }}">{{ $data->status }}</option>
                @endforeach
            </select>
            @error('status_id') <span style="color: red">{{ $message }}</span> @enderror
        </div>
        
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" wire:click="closeEquipmentForm">Close</button>
        @if(!empty($this->EquipmentID))
            <button class="btn btn-primary" wire:click="store">Save changes</button>
        @else
            <button class="btn btn-primary" wire:click="store">Submit</button>
        @endif
    </div>
</div>
