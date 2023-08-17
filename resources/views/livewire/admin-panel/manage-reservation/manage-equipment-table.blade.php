<div>
    <div id="content-container">
        <div id="page-content">
            <div class="panel">
                <div class="panel-heading">
                <h3 class="panel-title">Equipment Reservation</h3>
                </div>
                
                <div class="panel-body">
                    <div id="demo-dt-addrow_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        
                        <table id="dataTable" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID NO.</th>
                                    <th>Client Name</th>
                                    <th>Facility</th>
                                    <th>Event</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($EquipmentReservationData as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->getUser->name }}</td>
                                    <td>{{ $data->getEquipment->equipment_name }}</td>
                                    <td>{{ $data->event }}</td>
                                    <td><?php
                                        $date=$data->start;
                                        $date = new DateTime($date);
                                        echo $date->format('d/m/y h:i A');
                                    ?></td>
                                    <td><?php
                                        $date=$data->end;
                                        $date = new DateTime($date);
                                        echo $date->format('d/m/y h:i A');
                                    ?></td>
                                    <td>{{ $data->getStatus->status ?? '' }}</td>
                                    <td>
                                            <button class="btn btn-xs btn-dark" wire:click="editEquipmentReservation({{$data->id}})"><i class="fa fa-eye"></i> View</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div wire.ignore.self class="modal fade" id="EquipmentReservationModal" role="dialog" tabindex="-1" aria-labelledby="EquipmentReservationModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <livewire:admin-panel.manage-reservation.manage-equipment-view />
            </div>
        </div>
    </div>
    
    <div wire.ignore.self class="modal fade" id="RemarkModal" role="dialog" tabindex="-1" aria-labelledby="RemarkModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <livewire:admin-panel.remark.remark-form />
            </div>
        </div>
    </div>
    
</div>
@section('custom_script')
    @include('layouts.scripts.manage-equipment-reservation-table-scripts'); 
@endsection