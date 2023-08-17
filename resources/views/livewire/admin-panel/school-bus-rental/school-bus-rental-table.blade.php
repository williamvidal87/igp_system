<div>
    <div id="content-container">
        <div id="page-content">
            <div class="panel">
                <div class="panel-heading">
                <h3 class="panel-title">School Bus Rental</h3>
                </div>
                
                <div class="panel-body">
                    <div id="demo-dt-addrow_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="newtoolbar">
                            <div id="demo-custom-toolbar2" class="table-toolbar-left">
                                <button class="btn btn-primary btn-labeled" wire:click="createSchoolBusRental"><i class="btn-label fa fa-plus"></i>Add School Bus Rental</button>
                            </div>
                        </div>
                        <table id="dataTable" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID NO.</th>
                                    <th>Place Of Destination/Round Trip Rentals</th>
                                    <th>Rate</th>
                                    <th>Rate Description</th>
                                    <th>Max # of Pax</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($SchoolBusRentalData as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->destination_roud_trip }}</td>
                                    <td>{{ $data->rate }}</td>
                                    <td>{{ $data->rate_description }}</td>
                                    <td>{{ $data->max_of_pax }}</td>
                                    <td>{{ $data->getStatus->status }}</td>
                                    <td>
                                        <button class="btn btn-xs btn-info" wire:click="editSchoolBusRental({{$data->id}})"><i class="fa fa-edit"></i> Edit</button> |
                                        <button class="btn btn-xs btn-danger" wire:click="deleteSchoolBusRental({{$data->id}})"><i class="fa fa-trash"></i> Delete</button>
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
    
    <div wire.ignore.self class="modal fade" id="SchoolBusRentalModal" role="dialog" tabindex="-1" aria-labelledby="SchoolBusRentalModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <livewire:admin-panel.school-bus-rental.school-bus-rental-form />
            </div>
        </div>
    </div>
    
</div>
@section('custom_script')
    @include('layouts.scripts.admin-school-bus-rental-table-scripts'); 
@endsection