
@extends('layouts.admin')
@section('title','View Package Sessions List')
@section('content')
<div class="nk-content">
    <div class="container">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-between flex-wrap gap g-2">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title">View Package's Session List</h1>
                                <nav>
                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                        <li class="breadcrumb-item"><a href="{{ url('user/dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">View Package's Session List
                                        </li>
                                    </ol>
                                </nav>
                        </div>   
                        
                        <div class="nk-block-head-content">
                            <ul class="d-flex">
                            
                                <li><a href="{{ url('admin/stadium/create') }}" class="btn btn-primary d-none d-md-inline-flex"><span>Back</span></a></li>
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
                                    <th class="tb-col"><span class="overline-title">Package Name</span></th>
                                    </th>
                                    <th class="tb-col tb-col-xl"><span
                                            class="overline-title">Start Time</span></th>
                                            <th class="tb-col tb-col-xl"><span
                                                class="overline-title">End Time</span></th>
                                                <th class="tb-col tb-col-xl"><span
                                                    class="overline-title">Day</span></th>
                                            <th class="tb-col tb-col-xxl"><span class="overline-title">Status</span></th>
            
                                </tr>
                            </thead>
                            <tbody>
                                @if($sessions->count() > 0)
                          @foreach($sessions as $session)
                                <tr>                          
                                    <td class="tb-col tb-col-xxl">{{  $session->name }}</td>
                                    <td class="tb-col tb-col-xxl">{{  $session->start_time }}</td>                                 
                                    <td class="tb-col tb-col-xxl">{{  $session->end_time }}</td>                                 
                                    <td class="tb-col tb-col-xxl">{{  $session->day }}</td>                                                              
                                         <td class="tb-col tb-col-xxl"> 
                                            @if($session->status == 'pending')
                                            <span class="badge text-bg-warning-soft">Pending</span>
                                            @elseif($session->status == 'attended')
                                            <span class=" badge text-bg-success-soft">Attended</span>
                                            @elseif($session->status == 'not attended')
                                            <span class="badge text-bg-warning-soft">Not Attended</span>
                                            @else
                                            <span class="text-muted">Unknown Status</span>
                                        @endif
                                                             </td>
                                                  
                            
                                </tr>
           
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