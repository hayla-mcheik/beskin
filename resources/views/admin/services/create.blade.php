@extends('layouts.admin')
@section('title', 'Create Services')
@section('content')
<div class="nk-content">
    <div class="container">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-page-head">
                    <div class="nk-block-head">
                        <div class="nk-block-head-between flex-wrap gap g-2">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title">Create Package</h1>
                                    <nav>
                                        <ol class="breadcrumb breadcrumb-arrow mb-0">
                                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Packages
                                            </li>
                                        </ol>
                                    </nav>
                            </div>
                            <div class="nk-block-head-content">
                                <ul class="d-flex">
                                
                                    <li><a href="{{ url('admin/packages/list') }}" class="btn btn-primary d-none d-md-inline-flex">
                                        <span>Back</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title">Create Services</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
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
                                        <label class="form-label">Name</label>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                            <label for="name">Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Title</label>                                   
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="title" placeholder="title" name="title">
                                            <label for="title">Title</label>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Description</label>
                                            <div class="form-control-wrap">
                                                <textarea name="description" id="description" required></textarea>
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
                                        <label class="form-label">Title One</label>                                   
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="titleone" placeholder="title" name="titleone">
                                            <label for="titleone">Title</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Description One</label>
                                            <div class="form-control-wrap">
                                                <textarea name="descone" id="descone" required></textarea>
                                                <div class="invalid-feedback">
                                                    Please enter description.
                                                </div>
                                                <br>
                                                <script>
                                                    $('#descone').summernote();
                                                </script>
                                            
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Title Two</label>                                   
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="titletwo" placeholder="title" name="titletwo">
                                            <label for="titletwo">Title two</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Description Two</label>
                                            <div class="form-control-wrap">
                                                <textarea name="desctwo" id="desctwo" required></textarea>
                                                <div class="invalid-feedback">
                                                    Please enter description.
                                                </div>
                                                <br>
                                                <script>
                                                    $('#desctwo').summernote();
                                                </script>
                                            
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Title Three</label>                                   
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="titlethree" placeholder="title" name="titlethree">
                                            <label for="titlethree">Title Three</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Description Three</label>
                                            <div class="form-control-wrap">
                                                <textarea name="descthree" id="descthree" required></textarea>
                                                <div class="invalid-feedback">
                                                    Please enter description.
                                                </div>
                                                <br>
                                                <script>
                                                    $('#descthree').summernote();
                                                </script>
                                            
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Title Four</label>                                   
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="titlefour" placeholder="title" name="titlefour">
                                            <label for="titlefour">Title Four</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Description Four</label>
                                            <div class="form-control-wrap">
                                                <textarea name="descfour" id="descfour" required></textarea>
                                                <div class="invalid-feedback">
                                                    Please enter description.
                                                </div>
                                                <br>
                                                <script>
                                                    $('#descfour').summernote();
                                                </script>
                                            
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Select Image</label>
                                        <div class="form-control-wrap"><input class="form-control"
                                            id="formFileRg" type="file" name="image"></div>
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