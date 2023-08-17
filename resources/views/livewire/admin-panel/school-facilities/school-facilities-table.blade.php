<div>
    <div id="content-container">
        <div id="page-content">
            <div class="panel">
                <div class="panel-heading">
                <h3 class="panel-title">School Facilities</h3>
                </div>
                
                <div class="panel-body">
                    <div id="demo-dt-addrow_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="newtoolbar">
                            <div id="demo-custom-toolbar2" class="table-toolbar-left">
                                <button class="btn btn-primary btn-labeled" wire:click="createSchoolFacilities"><i class="btn-label fa fa-plus"></i>Add School Facilities</button>
                            </div>
                        </div>
                        <table id="dataTable" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID NO.</th>
                                    <th>Facility</th>
                                    <th>Rate</th>
                                    <th>Rate Description</th>
                                    <th>Max # of Pax</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($SchoolFacilitiesData as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->facility }}</td>
                                    <td>{{ $data->rate }}</td>
                                    <td>{{ $data->rate_description }}</td>
                                    <td>{{ $data->max_of_pax }}</td>
                                    <td>{{ $data->getStatus->status }}</td>
                                    <td>
                                        <button class="btn btn-xs btn-info" wire:click="editSchoolFacilities({{$data->id}})"><i class="fa fa-edit"></i> Edit</button> |
                                        <button class="btn btn-xs btn-danger" wire:click="deleteSchoolFacilities({{$data->id}})"><i class="fa fa-trash"></i> Delete</button>
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
                <livewire:admin-panel.school-facilities.school-facilities-form />
            </div>
        </div>
    </div>
    
</div>
@section('custom_script')
    @include('layouts.scripts.admin-school-facilities-table-scripts'); 
@endsection