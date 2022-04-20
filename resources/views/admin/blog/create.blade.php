<x-admin>
<x-slot name="title">
Blog
</x-slot>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> Add Post</h1>
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
                        <form action="{{ route('blog.create') }}" method="POST" role="form" enctype="multipart/form-data">
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
                                        value="{{ old('title') }}"
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
                                        value="{{ old('sub_title') }}"
                                        required
                                       
                                        
                                    />
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('sub_title') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="categories">Category</label>
                                            <select name="category_id"  class="form-control" required>
                                            <option value="">Select a Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                                required
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="description">Content</label>
                                    <textarea name="description" id="description" rows="8" class="form-control summernote"  required>{{ old('content') }}</textarea>
                                    <div class="invalid-feedback active">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> @error('description') <span>{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Post</button>
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
