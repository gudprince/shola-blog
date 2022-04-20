<x-admin>
<x-slot name="title">
    Users
  </x-slot>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i>User</h1>
            <p>Users List</p>
        </div>
        @can('super_admin')
        <a href="{{ route('user.create') }}" class="btn btn-primary pull-right">Add User</a>
        @endcan
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th> No </th>
                            <th class="text-capitalize"> First Name </th>
                            <th class="text-capitalize"> Last Name </th>
                            <th class="text-center"> Email </th>
                            <th class="text-center"> Roles </th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $i = 1; @endphp
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                    <label class="badge badge-success">{{ $user->user_type}}</label>
                                    </td>
                                    <td class="text-center">
                                        @can('super_admin')
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$user->id}}">
                                            <i class="fa fa-trash"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are You Sure</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            You won't be able to revert back if deleted
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <a href="{{ route('user.delete', $user->id) }}" class=""><button type="button" class="btn btn-primary">Confirm</button></a>
                                                        </div>
                                                     </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush

</x-admin>