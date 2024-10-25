@extends('layouts.admin')
@section('title', 'Create Slot ')
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
                            <h3 class="nk-block-title">Create Slot</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.schedule.store') }}" method="POST">
                                @csrf

                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
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
                                                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="timePickerStart" class="form-label">Start Time</label>
                                            <div class="form-control-wrap">
                                                <input placeholder="hh:mm AM/PM" name="start_time" type="datetime-local" class="form-control " autocomplete="off" id="timePickerStart">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="timePickerStart" class="form-label">End Time</label>
                                            <div class="form-control-wrap">
                                                <input placeholder="hh:mm AM/PM" name="end_time" type="datetime-local" class="form-control " autocomplete="off" id="timePickerStart">
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="datePicker" class="form-label">Day</label>
                                            <div class="form-control-wrap">
                                                <input placeholder="dd/mm/yyyy" name="day" type="text"
                                                    class="form-control js-datepicker" data-title="Text"
                                                    data-today-btn="true" data-today-btn-mode="1" data-clear-btn="true"
                                                    autocomplete="off" id="datePicker">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Submit">Submit</button>
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



