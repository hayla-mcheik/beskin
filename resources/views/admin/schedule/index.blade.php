@extends('layouts.admin')
@section('title', 'Slots List')
@section('content')
<div class="nk-content">
    <div class="container">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-between flex-wrap gap g-2">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title">Schedule List</h2>
                            <nav>
                                <ol class="breadcrumb breadcrumb-arrow mb-0">
                                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Schedule</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="nk-block-head-content">
                            <ul class="d-flex">
                                <li><a href="{{ url('admin/schedule/create') }}" class="btn btn-primary d-none d-md-inline-flex"><em
                                            class="icon ni ni-plus"></em><span>Add Schedule</span></a></li>
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
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Slot Information</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Doctor:</strong> <span id="eventDoctor"></span></p>
                <p><strong>Start Time:</strong> <span id="eventStartTime"></span></p>
                <p><strong>End Time:</strong> <span id="eventEndTime"></span></p>
                <p><strong>Status:</strong> <span id="eventStatus"></span></p>
                <!-- Delete form -->
                <form id="deleteForm" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: [
        @foreach($doctorschedules as $slot)
          {
            title: '{{ $slot->doctors->name }}',
            start: '{{ \Carbon\Carbon::parse($slot->day)->format("Y-m-d") }}T{{ \Carbon\Carbon::parse($slot->start_time)->format("H:i:s") }}',
            end: '{{ \Carbon\Carbon::parse($slot->day)->format("Y-m-d") }}T{{ \Carbon\Carbon::parse($slot->end_time)->format("H:i:s") }}',
            status: '{{ $slot->status }}',
            className: '{{ $slot->status === "reserved" ? "fc-day-reserved" : "" }}'
          },
        @endforeach
      ],
      eventClick: function (info) {
        $('#eventDoctor').text(info.event.title);
        $('#eventStartTime').text(info.event.start.toLocaleTimeString());
        $('#eventEndTime').text(info.event.end.toLocaleTimeString());
        $('#eventStatus').text(info.event.extendedProps.status);

        $('#deleteForm').attr('action', '{{ route("admin.schedule.delete", ["id" => $slot->id]) }}');
        $('#eventModal').modal('show');
      }
    });
    calendar.render();
  });
</script>
@endpush

@endsection
