
@extends('layouts.admin')
@section('title','portfolio List')
@section('content')
<div class="nk-content">
    <div class="container">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-between flex-wrap gap g-2">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title">Portfolio List</h1>
                                <nav>
                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Portfolio
                                        </li>
                                    </ol>
                                </nav>
                        </div>
                        <div class="nk-block-head-content">
                            <ul class="d-flex">
                            
                           <li><a href="{{ url('admin/portfolio/create') }}" class="btn btn-primary d-none d-md-inline-flex"><em
                                            class="icon ni ni-plus"></em><span>Add Portfolio</span></a></li> 
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
                        
                        <table class="datatable-init table" data-nk-container="table-responsive">
                            <thead class="table-light">
                                <tr>

                      
                                    <th class="tb-col"><span class="overline-title">Service Name</span></th>
                    
                                    <th class="tb-col tb-col-end" data-sortable="false"><span
                                            class="overline-title">Action</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($portfolios->count() > 0)
                          @foreach($portfolios as $portfolio)
                                <tr>                     
                            
                                    <td class="tb-col tb-col-xxl">{{  $portfolio->service->name }}</td>
                                    <td class="tb-col tb-col-end">
                                        <div class="dropdown"><a
                                                class="btn btn-sm btn-icon btn-zoom me-n1"
                                                data-bs-toggle="dropdown"><em
                                                    class="icon ni ni-more-v"></em></a>
                                            <div
                                                class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                <div class="dropdown-content py-1">
                                                    <ul
                                                        class="link-list link-list-hover-bg-primary link-list-md">
                                                        <li><a href="{{ route('admin.portfolio.edit' , ['id' => $portfolio->id]) }}"><em
                                                                    class="icon ni ni-edit"></em><span>Edit</span></a>
                                                        </li>
                                                        
                                                        <li>
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#deletePortfolioModal{{ $portfolio->id }}">
                                                                <em class="icon ni ni-trash"></em>
                                                                <span>Delete</span>
                                                            </a>
                                                        </li>

                                                        <li><a href="{{ route('admin.portfolio.images' , ['id' => $portfolio->id]) }}"><em
                                                            class="icon ni ni-eye"></em><span>Images</span></a>
                                                </li>
                                                        
                                          
                                                    </ul>
                                                </div> 
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                             <div class="modal fade" id="deletePortfolioModal{{ $portfolio->id }}" tabindex="-1" aria-labelledby="deletePortfolioModal{{ $portfolio->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="addUserModalLabel">Are you sure you want to delete this data?</h4><button type="button" class="btn-close"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.portfolio.delete' , ['id' => $portfolio->id]) }}" method="GET">
                                                    @csrf
                                                    <div class="row g-3">
                                           
                                              
                                                        <div class="col-lg-12">
                                                            <div class="d-flex gap g-2">
                                                                <div class="gap-col"><button class="btn btn-primary" type="submit">Delete</button>
                                                                </div>
                                                                <div class="gap-col"><button type="button" class="btn border-0"
                                                                        data-bs-dismiss="modal">Discard</button></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                @endforeach

                @else
                <tr><td>No Data Available</td></tr>
                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection