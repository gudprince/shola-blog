<x-admin>
<x-slot name="title">
Blog
</x-slot>
    <div class="app-title">
        <div>
            <h1 class=" "><i class="fa fa-shopping-bag"></i>Blog</h1>
            <p>Blog List</p>
        </div>
        <a href="{{ route('blog.create') }}" class="btn btn-primary pull-right">Add Post</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered table-responsive" id="sampleTable">
                        <thead>
                        <tr>
                            <th> # </th>
                            <th>Title</th>
                            <th>Visibility</th>
                            <th>Menu</th>
                            <th>Date</th>
                            <th>Views</th>
                            <th>Author</th>
                            <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>@if ($post->published == 1)
                                        <span class="badge badge-success">Published</span>
                                        @else
                                        <span class="badge badge-danger">Not Published</span>
                                        @endif
                                    </td>
                                    <td>@if ($post->menu == 1)
                                        <span class="badge badge-success">Featured</span>
                                        @elseif ($post->menu == 2)
                                        <span class="badge badge-primary">Trending</span>
                                        @elseif ($post->menu == 3)
                                        <span class="badge badge-danger">Hot</span>
                                        @elseif ($post->menu == 4)
                                        <span class="badge badge-warning">Headline</span>
                                        @else
                                        <span class="badge badge-secondary">ordinary</span>
                                        @endif
                                    </td>
                                    <td>{{ date('d F Y',strtotime($post->created_at))}}</td>
                                    <td>{{ $post->post_views->count()}}</td>
                                    <td class="text-capitalize">{{ $post->user->first_name.' '.$post->user->last_name}}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            @can('support_team', $post)
                                            <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('editor')
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal2{{$post->id}}">
                                            <i class="fa fa-plane"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal2{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update: {{ $post->title }} </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="float-left">
                                                            <form action="{{route('blog.update.menu')}}" method="POST" role="form">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Select an option</label>
                                                                <select class="form-control" id="exampleFormControlSelect1" name="menu" required>
                                                                    <option value="1" {{ ($post->menu == 1 ? 'selected' : '') }}>Featured</option>
                                                                    <option value="2" {{ ($post->menu == 2 ? 'selected' : '') }}>Trending</option>
                                                                    <option value="3" {{ ($post->menu == 3 ? 'selected' : '') }}>Hot</option>
                                                                    <option value="4" {{ ($post->menu == 4 ? 'selected' : '') }}>Headline</option>
                                                                    <option value="0" {{ ($post->menu == 0 ? 'selected' : '') }}>Ordinary</option>
                                                                   
                                                                </select>
                                                                <input type="hidden" name="id" value="{{$post->id}}">
                                                            </div>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </form>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  
                                                        </div>
                                                     </div>
                                                </div>
                                            </div>
                                            @endcan
                                            @can('editor')
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal3{{$post->id}}">
                                            <i class="fa fa-eye"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal3{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update: {{ $post->title }} </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="float-left">
                                                            <form action="{{route('publish')}}" method="POST" role="form">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Select an option</label>
                                                                <select class="form-control" id="exampleFormControlSelect1" name="published" required>
                                                                    <option value="0" {{ ($post->published == 0 ? 'selected' : '') }}>Unpublished</option>
                                                                    <option value="1" {{ ($post->published == 1 ? 'selected' : '') }}>Published</option>
  
                                                                </select>
                                                                <input type="hidden" name="id" value="{{$post->id}}">
                                                            </div>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </form>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  
                                                        </div>
                                                     </div>
                                                </div>
                                            </div>
                                            @endcan
                                            @can('support_team', $post)
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$post->id}}">
                                            <i class="fa fa-trash"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <a href="{{ route('blog.delete', $post->id) }}" class=""><button type="button" class="btn btn-primary">Confirm</button></a>
                                                        </div>
                                                     </div>
                                                </div>
                                            </div>
                                            @endcan
                                        </div>
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