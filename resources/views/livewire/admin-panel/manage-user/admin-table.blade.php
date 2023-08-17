<div>
    <div id="content-container">
        <div id="page-content">
            <div class="panel">
                <div class="panel-heading">
                <h3 class="panel-title">Admin</h3>
                </div>
                
                <div class="panel-body">
                    <div id="demo-dt-addrow_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="newtoolbar">
                            <div id="demo-custom-toolbar2" class="table-toolbar-left">
                                <button class="btn btn-primary btn-labeled" wire:click="createAdmin"><i class="btn-label fa fa-plus"></i>Add Admin</button>
                            </div>
                        </div>
                        <table id="dataTable" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Last Seen</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($AdminData as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>
                                        @if(Cache::has('is_online' . $data->id))
                                            <span class="text-success">Online</span>
                                        @else
                                            <span class="text-secondary">Offline</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($data->last_seen != null)
                                            {{ \Carbon\Carbon::parse($data->last_seen)->diffForHumans() }}
                                        @else
                                            No data
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-xs btn-info" wire:click="editAdmin({{$data->id}})"><i class="fa fa-edit"></i> Edit</button> |
                                        <button class="btn btn-xs btn-danger" wire:click="deleteAdmin({{$data->id}})"><i class="fa fa-trash"></i> Delete</button>
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
    
    <div wire.ignore.self class="modal fade" id="AdminModal" role="dialog" tabindex="-1" aria-labelledby="AdminModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <livewire:admin-panel.manage-user.admin-form />
            </div>
        </div>
    </div>
    
</div>
@section('custom_script')
    @include('layouts.scripts.admin-admin-table-scripts'); 
@endsection