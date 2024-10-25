
@extends('layouts.admin')
@section('title','User Booking List')
@section('content')
<div class="nk-content">
    <div class="container">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-between flex-wrap gap g-2">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title">User Booking Session List</h1>
                                <nav>
                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">User Booking List
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
                                    <th class="tb-col"><span class="overline-title">Instructor Name</span></th>
                                    </th>
                                    <th class="tb-col tb-col-xl"><span
                                            class="overline-title">Package Name</span></th> 
                                    <th class="tb-col tb-col-xl"><span
                                 class="overline-title">Fees</span></th>
                                 <th class="tb-col tb-col-xl"><span
                                    class="overline-title">Number of Session </span></th>
                                            <th class="tb-col tb-col-xxl"><span class="overline-title">Status</span></th>
                                    <th class="tb-col tb-col-end" data-sortable="false"><span
                                    class="overline-title">Action</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($previousbookingsession->count() > 0)
                          @foreach($previousbookingsession as $bookingsession)
                                <tr>                          
                                    <td class="tb-col tb-col-xxl">{{  $bookingsession->instructor->name }}</td>
                                    <td class="tb-col tb-col-xxl">{{  $bookingsession->package->name }}</td>                                 
                                    <td class="tb-col tb-col-xxl">{{  $bookingsession->package->fees }}$</td>                                 
                                    <td class="tb-col tb-col-xxl">{{  $bookingsession->package->sessions->count() }}</td>                                 
                                         <td class="tb-col tb-col-xxl"> 
                                            @if($bookingsession->status_message == 'pending')
                                            <span class="badge text-bg-warning-soft">Pending</span>
                                            @elseif($bookingsession->status_message == 'reserved')
                                            <span class=" badge text-bg-success-soft">Reserved</span>
                                            @else
                                            <span class="text-muted">Unknown Status</span>
                                        @endif
                                                             </td>
                                                  
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
                                                        <li><a href="{{ route('users.booking.session.view' , ['id' => $bookingsession->id]) }}"><em
                                                                    class="icon ni ni-eye"></em><span>View</span></a>
                                                        </li>
                         
                                                        
                                          
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
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

                <div class="nk-block-head mt-5">
                    <div class="nk-block-head-between flex-wrap gap g-2">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title">User Booking Stadium List</h1>
                                <nav>
                                    <ol class="breadcrumb breadcrumb-arrow mb-0">
                                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">User Booking Stadium List
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
                                    </th>
                                    <th class="tb-col tb-col-xl"><span
                                            class="overline-title">Start Time </span></th>
                                            <th class="tb-col tb-col-xxl"><span class="overline-title">End Time</span></th>
        
                                    <th class="tb-col"><span class="overline-title">Day</span></th>
                                    <th class="tb-col"><span class="overline-title">Fees</span></th>
                                    <th class="tb-col"><span class="overline-title">Status</span></th>
                                    <th class="tb-col tb-col-end" data-sortable="false"><span
                                    class="overline-title">Action</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($previousbookingstadium->count() > 0)
                          @foreach($previousbookingstadium as $bookingstadium)
                                <tr>                          
                                    <td class="tb-col tb-col-xxl">{{  $bookingstadium->stadium->name }}</td>
                                    <td class="tb-col tb-col-xxl">{{  $bookingstadium->slot->start_time }}</td>
                                    <td class="tb-col tb-col-xxl">{{  $bookingstadium->slot->end_time }}</td>
                                    <td class="tb-col tb-col-xxl">{{  $bookingstadium->slot->day }}</td>
                                    <td class="tb-col tb-col-xxl">{{  $bookingstadium->stadium->feetimeslots }}$</td>

                                    
                                     <td class="tb-col tb-col-xxl"> 
                                            @if($bookingstadium->status == 'pending')
                                            <span class="badge text-bg-warning-soft">Pending</span>
                                            @elseif($bookingstadium->status == 'paid')
                                            <span class=" badge text-bg-success-soft">Paid</span>
                                            @elseif($bookingstadium->status == 'cancel')
                                            <span class=" badge text-bg-success-soft">Cancel</span>
                                            @else
                                            <span class="text-muted">Unknown Status</span>
                                        @endif
                                                             </td>
                                                             <td class="tb-col tb-col-end">
                                                                <form action="{{ route('cancel.booking', ['id' => $bookingstadium->id]) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    @if($bookingstadium->status == 'pending')
                                                                    <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                                                                    @elseif($bookingstadium->status == 'paid')
                                                                    <button type="submit" class="btn btn-sm btn-success">Paid</button>
                                                                    @else
                                                                    <button class="btn btn-sm btn-danger">You are Canceled the reservation</button>
                                                               @endif
                                                                </form>
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