<x-admin>
<x-slot name="title">
Blog
</x-slot>
<div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> Edit - Post</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                    <li class="nav-item"><a class="nav-link" href="#images" data-toggle="tab">Manage Comments</a></li>
                </ul>
            </div>
            <div class="py-4 d-none d-md-block">
                <h3>Post image </h3>
                <img class="img-fluid" src="{{asset($post->image)}}" alt="product image">
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                    <form action="{{ route('blog.update') }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            <h3 class="tile-title">Post Information</h3>
                            <hr>
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label" for="title">Title</label>
                                    <input
                                        class="form-control @error('title') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter title"
                                        id="title"
                                        name="title"
                                        value="{{ old('title',  $post->title) }}"
                                        required
                                       
                                        
                                    />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('title') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="sub_title">Sub Title</label>
                                    <input
                                        class="form-control @error('sub_title') is-invalid @enderror"
                                        type="text"
                                        placeholder="Enter Sub_title"
                                        id="sub_title"
                                        name="sub_title"
                                        value="{{ old('sub_title',  $post->sub_title) }}"
                                        required
                                       
                                        
                                    />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('sub_title') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="categories">Categories</label>
                                            <select name="category_id" id="categories" class="form-control" >
                                                @foreach($categories as $category)
                                                   @if($category->id ==  $post->category_id)
                                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                                    @else
                                                    <option value="{{ $category->id }}" >{{ $category->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="image">Image</label>
                                            <input
                                                class="form-control"
                                                type="file"
                                                id="image"
                                                name="image"
                                               
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input
                                                class="form-control"
                                                type="hidden"
                                                name="id"
                                                value="{{ old('id',  $post->id) }}"
                                               
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="description">Content</label>
                                    <textarea name="description" id="description" rows="8" class="form-control summernote"  required>{{ old('description',  $post->description) }}</textarea>
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('description') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Post</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="py-4 d-md-none">
                            <h3>Post image </h3>
                            <img class="img-fluid" src="{{asset('storage/blog/'.$post->image)}}" alt="product image">
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="images">
                    <div class="tile">
                           
                        <div class="mt-4">
                            <h3 class="tile-title">Comment list</h3>
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th>name</th>
                                        <th>email</th>
                                        <th class="">Content</th>
                                        <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ( $post->comments->count() > 0)
                                    @foreach($post->comments as $key => $comments)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $comments->full_name }}</td>
                                        <td>{{ $comments->email_address }}</td>
                                        <td>{{ $comments->content }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Second group">
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $comments->id }}">
                                            <i class="fa fa-trash"></i>
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$comments->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <a href="{{ route('comment.delete', $comments->id) }}" class=""><button type="button" class="btn btn-primary">Confirm</button></a>
                                                        </div>
                                                     </div>
                                                </div>
                                            </div>
                                        </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin>
