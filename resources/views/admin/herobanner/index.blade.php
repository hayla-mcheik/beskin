
@extends('layouts.admin')
@section('title','Hero Banner')
@section('content')

<div class="nk-content">
    <div class="container">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-between flex-wrap gap g-2">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title">Hero Banner</h1>
                                <nav>
                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Hero Banner</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Hero Banner
                                        </li>
                                    </ol>
                                </nav>
                        </div>
                        <div class="nk-block-head-content">
                            <ul class="d-flex">

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    @if(session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
        
                @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
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

    <div class="card">
        <div class="card-body">
            <form method="POST" id="frm1" enctype="multipart/form-data"
                action="{{ Route('admin.hero.banner.update') }}" novalidate>
                @csrf
                <div align="center">
                    <img alt="" id="img" src="{{ isset($herobanner) ? asset( $herobanner->image) : '' }}" width="50%">
                </div>
                <br>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" accept="image/*" id="customFile"
                        onchange="desc(event,'img');" name="image">
                    <div class="invalid-feedback">
                        Please choose an image.
                    </div>
                    <label class="custom-file-label" for="customFile">Choose file...</label>
                </div>
       
                <br>
          
                <label>Title </label>
    <input type="text" class="form-control" placeholder="enter title" name="title" value="{{ isset($herobanner) ? $herobanner->title : ''}}"
      />

                <label>Description </label>
                                            <textarea name="description" id="description" required>{{ isset($herobanner) ? $herobanner->description : ''}}</textarea>
                                            <div class="invalid-feedback">
                                                Please enter description.
                                            </div>
                                            <br>
                                            <script>
                                                $('#description').summernote();
                                            </script>
                
                  <br>
                <div align="center">
                    <br>
                    <button type="submit" class="btn btn-primary">Save</button>
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