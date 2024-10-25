@extends('layouts.admin')
@section('title', 'Create Blogs')
@section('content')
<div class="nk-content">
    <div class="container">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-page-head">
                    <div class="nk-block-head">
                        <div class="nk-block-head-between flex-wrap gap g-2">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title">edit Blog</h1>
                                    <nav>
                                        <ol class="breadcrumb breadcrumb-arrow mb-0">
                                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Blog
                                            </li>
                                        </ol>
                                    </nav>
                            </div>
                            <div class="nk-block-head-content">
                                <ul class="d-flex">
                                
                                    <li><a href="{{ url('admin/blogs') }}" class="btn btn-primary d-none d-md-inline-flex">
                                        <span>Back</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title">Edit Blog</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.blogs.update', ['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @if(session('status'))
                                    <div class="alert alert-danger">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row gx-gs gy-4">            
           
                                    <div class="col-md-6">
                                        <label class="form-label">Title</label>                                   
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{ $blog->title }}">
                                            <label for="title">Title</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">By</label>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="by" placeholder="by" name="by" value="{{ $blog->by }}">
                                            <label for="by">By</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Date</label>
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="date" placeholder="date" name="date" value="{{ $blog->date }}">
                                            <label for="date">Date</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <div class="form-control-wrap">
                                                <textarea name="description" id="description" required>{{ $blog->description }}</textarea>
                                                <div class="invalid-feedback">
                                                    Please enter description.
                                                </div>
                                                <br>
                                                <script>
                                                    $('#description').summernote();
                                                </script>
                                            
                                            </div>
                                        </div>
                                    </div>

                                  
                                    <div class="col-md-6">
                                        <div class="form-group"><label
                                            class="form-label">Thumbnail</label>
                                        <div class="form-control-wrap">
                                            <div
                                                class="image-upload-wrap d-flex flex-column align-items-center">
                                                <div class="media media-huge border"><img
                                                        id="image-result"
                                                        class="w-100 h-100"
                                                        src="{{ asset($blog->image) }}"
                                                        alt="avatar" 
                                                       ></div>
                                                <div class="pt-3"><input name="image"
                                                        class="upload-image"
                                                        data-target="image-result"
                                                        id="change-avatar" type="file"
                                                        max="1" hidden><label
                                                        for="change-avatar"
                                                        class="btn btn-md btn-primary">Change</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-note mt-3">Set the product
                                            thumbnail image. Only *.png, *.jpg and *.jpeg
                                            image files are accepted.</div>
                                    </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        console.log("Document ready");
        $('#description').summernote();
    });
</script>
@endpush