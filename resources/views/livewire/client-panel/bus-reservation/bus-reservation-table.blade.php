<div>
    <div id="content-container">
        <div id="page-content">
            <div class="panel">
                <div class="panel-heading">
                <h3 class="panel-title">School Bus Rental Reservation</h3>
                </div>
                
                <div class="panel-body">
                    <div id="demo-dt-addrow_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="newtoolbar">
                            <div id="demo-custom-toolbar2" class="table-toolbar-left">
                                <button class="btn btn-primary btn-labeled" wire:click="createSchoolFacilities"><i class="btn-label fa fa-plus"></i>Add Bus Rental Reservation</button>
                            </div>
                        </div>
                        <table id="dataTable" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID NO.</th>
                                    <th>Place Of Destination/Round Trip Rentals</th>
                                    <th>Event</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($SchoolFacilitiesData as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->getBus->destination_roud_trip }}</td>
                                    <td>{{ $data->purpose }}</td>
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
                                        @if($data->getStatus->id==6)
                                            <button class="btn btn-xs btn-info" wire:click="editSchoolFacilities({{$data->id}})"><i class="fa fa-edit"></i> Edit</button> |
                                            <button class="btn btn-xs btn-danger" wire:click="deleteSchoolFacilities({{$data->id}})"><i class="fa fa-trash"></i> Delete</button>
                                        @endif
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
    
    <div wire.ignore.self class="modal fade" id="SchoolFacilitiesModal" role="dialog" tabindex="-1" aria-labelledby="SchoolFacilitiesModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <livewire:client-panel.bus-reservation.bus-reservation-form />
            </div>
        </div>
    </div>
    
</div>
@section('custom_script')
    @include('layouts.scripts.bus-reservation-table-scripts'); 
@endsection