
@extends('layouts.admin')
@section('title','Blogs List')
@section('content')
<div class="nk-content">
    <div class="container">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-between flex-wrap gap g-2">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title mb-2">Appointments List</h1>
                                <nav>
                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Appointments
                                        </li>
                                    </ol>
                                </nav>
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

                                    <th class="tb-col"><span class="overline-title">Name</span></th>                             
                                    <th class="tb-col"><span class="overline-title">Email</span></th>
                                    <th class="tb-col"><span class="overline-title">Phone</span></th>
                                    <th class="tb-col"><span class="overline-title">Service</span></th>
                                    <th class="tb-col"><span class="overline-title">Doctor</span></th>
                                    <th class="tb-col"><span class="overline-title">Date</span></th>
                      
             
                                </tr>
                            </thead>
                            <tbody>
                                @if($appointments->count() > 0)
                                @foreach($appointments as $appointment)
                                <tr>                     
                            
                                    <td class="tb-col tb-col-xxl">{{ $appointment->name }}</td>
                                    <td class="tb-col tb-col-xxl">{{ $appointment->email }}</td>
                                    <td class="tb-col tb-col-xxl">{{ $appointment->phone }}</td>
                                    <td class="tb-col tb-col-xxl">{{ $appointment->service->name }}</td>
                                    <td class="tb-col tb-col-xxl">{{ $appointment->doctor->name }}</td>
                                    <td class="tb-col tb-col-xxl">{{ $appointment->slot->start_time }} - {{ $appointment->slot->end_time }}</td>
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