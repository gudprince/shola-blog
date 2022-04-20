<x-admin>
<x-slot name="title">
 Edit User
</x-slot>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i>Edit - User</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form action="{{ route('user.update') }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <hr>
                            <div class="tile-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="first_name">First Name</label>
                                            <input
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter first name"
                                                id="first_name"
                                                name="first_name"
                                                value="{{old('first_name', $user->first_name)}}"
                                                required
                                            />
                                            <div class="invalid-feedback active">
                                                 <i class="fa fa-exclamation-circle fa-fw"></i> @error('first_name') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="first_name">Last Name</label>
                                            <input
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter last name"
                                                id="last_name"
                                                name="last_name"
                                                value="{{old('last_name', $user->last_name)}}"
                                                required
                                            />
                                            <div class="invalid-feedback active">
                                                 <i class="fa fa-exclamation-circle fa-fw"></i> @error('last_name') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="name" >User Type</label>
                                              
                                            <select name="user_type" id="" class="form-control" required>
                                                <option value="">select user type</option>
                                                @foreach($user_type as $type)
                                                @if($user->user_type == $type)
                                                <option value="{{$type}}" selected>{{$type}}</option>
                                                @else
                                                <option value="{{$type}}" >{{$type}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback active">
                                                 <i class="fa fa-exclamation-circle fa-fw"></i> @error('user_type') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="name">Password</label>
                                            <input
                                                class="form-control @error('password') is-invalid @enderror"
                                                type="password"
                                                id="password"
                                                name="password"
                                            />
                                            <div class="invalid-feedback active">
                                                 <i class="fa fa-exclamation-circle fa-fw"></i> @error('password') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="email">Email</label>
                                            <input
                                                class="form-control @error('email') is-invalid @enderror"
                                                type="email"
                                                placeholder="Enter email address"
                                                id="email"
                                                name="email"
                                                value="{{ old('email', $user->email) }}"
                                                required
                                            />
                                            <div class="invalid-feedback active">
                                                 <i class="fa fa-exclamation-circle fa-fw"></i> @error('email') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input
                                    class="form-control @error('id') is-invalid @enderror"
                                    type="hidden"
                                  
                                    id="id"
                                    name="id"
                                    value="{{ old('id', $user->id) }}"
                                />
                                
                                <div class="tile-footer">
                                    <div class="row d-print-none mt-2">
                                        <div class="col-12 text-right">
                                              <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update User</button>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>