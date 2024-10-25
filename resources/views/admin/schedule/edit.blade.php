@extends('layouts.admin')
@section('title', 'Edit Slot ')
@section('content')
<div class="nk-content">
    <div class="container">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-page-head">
                    <div class="nk-block-head-content">
                        <h1 class="nk-block-title">Slots </h1>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title">Edit Slot</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.schedule.update', $slot->id) }}" method="POST">
                                @csrf
                                @method('PUT')
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

                                <div class="row gx-gs gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Select Doctor</label>
                                            <div class="form-control-wrap">
                                                <select class="js-select" name="doctor_id" multiple data-search="true"
                                                    data-sort="false">
                                                    @foreach($doctors as $doctor)
                                                        <option value="{{ $doctor->id }}" {{ $doctor->id == $slot->doctor_id ? 'selected':'' }}>{{ $doctor->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="timePickerStart" class="form-label">Start Time</label>
                                            <div class="form-control-wrap">
                                                <input placeholder="HH:mm" name="start_time" type="datetime-local"
                                                    class="form-control js-timepicker" autocomplete="off"
                                                    id="timePickerStart" pattern="\d{1,2}:\d{2}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="timePickerStart" class="form-label">End Time</label>
                                            <div class="form-control-wrap">
                                                <input placeholder="HH:mm" name="end_time" type="datetime-local"
                                                    class="form-control js-timepicker" autocomplete="off"
                                                    id="timePickerStart" pattern="\d{1,2}:\d{2}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="datePicker" class="form-label">Day</label>
                                            <div class="form-control-wrap">
                                                <input placeholder="mm/dd/yyyy" name="day" type="text"
                                                    class="form-control js-datepicker" data-title="Text"
                                                    data-today-btn="true" data-today-btn-mode="1" data-clear-btn="true"
                                                    autocomplete="off" id="datePicker">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Update">Update</button>
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
@push('scripts')
<script>
    flatpickr(".js-timepicker", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
    });
</script>
@endpush

@endsection
