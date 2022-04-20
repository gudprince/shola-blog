<x-admin>
<x-slot name="title">
  Dashboard
  </x-slot>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <div class="widget-small primary coloured-icon">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Admin</h4>
                    <p><b>{{$admin}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widget-small warning coloured-icon">
                <i class="icon fa fa-newspaper-o fa-3x"></i>
                <div class="info">
                    <h4>Total Post</h4>
                    <p><b>{{$postTotal}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-newspaper-o fa-3x"></i>
                <div class="info">
                    <h4>Published Post</h4>
                    <p><b>{{$publishPost}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widget-small danger coloured-icon">
                <i class="icon fa fa-newspaper-o fa-3x"></i>
                <div class="info">
                    <h4>Unpublish Post</h4>
                    <p><b>{{$UnpublishPost}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widget-small info coloured-icon">
                <i class="icon fa fa-institution fa-3x"></i>
                <div class="info">
                    <h4>Categories</h4>
                    <p><b>{{$category}}</b></p>
                </div>
            </div>
        </div> 
    </div>
</x-admin>