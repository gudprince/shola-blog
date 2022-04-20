<x-admin>
<x-slot name="title">
    Profile
</x-slot>
<div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i>Profile</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    @if($errors->any())
      <div class="alert alert-danger"> an error occurred</div>
    @endif
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                    <li class="nav-item"><a class="nav-link" href="#images" data-toggle="tab">Change Password</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form action="{{ route('profile.update') }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <hr>
                            <div class="tile-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="name">First Name</label>
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
                                            <label class="control-label" for="last_name">Last Name</label>
                                            <input
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                type="text"
                                                placeholder="Enter first name"
                                                id="last_name"
                                                name="first_name"
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
                                            <input
                                                class="form-control @error('user_type') is-invalid @enderror"
                                                type="text"
                                                id="user_type"
                                                name="user_type"
                                                value="{{old('user_type', $user->user_type)}}"
                                                disabled
                                                required
                                            />
                                            <div class="invalid-feedback active">
                                                 <i class="fa fa-exclamation-circle fa-fw"></i> @error('user_type') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="gender" >Gender</label> 
                                            <select name="gender" id="gender" class="form-control" required> 
                                                <option value="" >Select gender</option> 
                                                <option value="Male" {{$user->gender == 'Male' ? 'selected': ''}}>Male</option>
                                                <option value="Female" {{$user->gender == 'Female' ? 'selected': ''}}>Female</option>
                        
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="name" >Phone Number</label> 
                                            <input
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                type="text"
                                                id="phone_number"
                                                name="phone_number"
                                                value="{{old('phone_number', $user->phone_number)}}"
                                                required
                                            />
                                            <div class="invalid-feedback active">
                                                 <i class="fa fa-exclamation-circle fa-fw"></i> @error('phone_number') <span>{{ $message }}</span> @enderror
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
                                              <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Profile</button>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane" id="images">
                    <div class="tile">
                        <h3 class="tile-title">Change Password</h3>
                        <hr>
                        <div class="tile-body">
                        <form action="{{ route('password') }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <hr>
                            <div class="tile-body">
                                
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="name">Current Password</label>
                                            <input
                                                class="form-control @error('current_password') is-invalid @enderror"
                                                type="password"
                                                id="password"
                                                name="current_password"
                                                required
                                            />
                                            <div class="invalid-feedback active">
                                                 <i class="fa fa-exclamation-circle fa-fw"></i> @error('current_password') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="name"> New Password</label>
                                            <input
                                                class="form-control @error('new_password') is-invalid @enderror"
                                                type="password"
                                                id="password"
                                                name="new_password"
                                                required
                                            />
                                            <div class="invalid-feedback active">
                                                 <i class="fa fa-exclamation-circle fa-fw"></i> @error('new_password') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="name">Confirm Password</label>
                                            <input
                                                class="form-control @error('new_confirm_password') is-invalid @enderror"
                                                type="password"
                                                id="password"
                                                name="new_confirm_password"
                                                required
                                            />
                                            <div class="invalid-feedback active">
                                                 <i class="fa fa-exclamation-circle fa-fw"></i> @error('new_confirm_password') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tile-footer">
                                    <div class="row d-print-none mt-2">
                                        <div class="col-12 text-right">
                                              <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Change Password</button>
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