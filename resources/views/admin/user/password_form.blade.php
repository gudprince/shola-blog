<x-admin>
<x-slot name="title">
 Edit Password
</x-slot>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i>Change Password</h1>
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
                        <form action="{{ route('password') }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <hr>
                            <div class="tile-body">
                                
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="name">Current Password</label>
                                            <input
                                                class="form-control @error('password') is-invalid @enderror"
                                                type="password"
                                                id="password"
                                                name="current_password"
                                            />
                                            <div class="invalid-feedback active">
                                                 <i class="fa fa-exclamation-circle fa-fw"></i> @error('password') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="name"> New Password</label>
                                            <input
                                                class="form-control @error('password') is-invalid @enderror"
                                                type="password"
                                                id="password"
                                                name="new_password"
                                            />
                                            <div class="invalid-feedback active">
                                                 <i class="fa fa-exclamation-circle fa-fw"></i> @error('password') <span>{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="name">Confirm Password</label>
                                            <input
                                                class="form-control @error('password') is-invalid @enderror"
                                                type="password"
                                                id="password"
                                                name="new_confirm_password"
                                            />
                                            <div class="invalid-feedback active">
                                                 <i class="fa fa-exclamation-circle fa-fw"></i> @error('password') <span>{{ $message }}</span> @enderror
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