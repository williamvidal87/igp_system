<div>
        <div class="modal-header">
        <button type="button" class="close" wire:click="closeRemark"><i class="pci-cross pci-circle"></i></button>
        <h4 class="modal-title" id="mySmallModalLabel">Remarks</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <input type="text" class="form-control" id="remark" wire:model="remark" required>
            </div>
        </div>
        <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-primary" wire:click="SaveRemark">Yes</button>
            <button type="button" class="btn btn-secondary" wire:click="closeRemark">No</button>
        </div>
</div>
