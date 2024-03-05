<?php
$colours = [
    'primary'   => 'background:rgba(39,128,227,1)',
    'secondary' => 'background:rgba(55,58,60,1)',
    'success'   => 'background:rgba(63,182,24,1)',
    'info'      => 'background:rgba(153,84,187,1)',
    'warning'   => 'background:rgba(255,117,24,1)',
    'danger'    => 'background:rgba(255,0,57,1)',
];
?>
@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Update Job
                </div>
                <div class="float-end">
                    <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('jobs.update', $job->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="machineName" class="col-md-4 fol-form-label text-md-end text-start">Machine</label>
                        <div class="col-md-6">
                            <input type="hidden" name="machine" id="machine" value="{{ $job->getMachine->id }}">
                            <input type="text" name="machineName" id="machineName" class="form-control" value="{{ $job->getMachine->stock }} - {{ $job->getMachine->make }} {{ $job->getMachine->model }} - {{$job->getMachine->getCustomer->name}}" readonly="" disabled="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="number" class="col-md-4 col-form-label text-md-end text-start">Syrinx Job No#</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('number') is-invalid @enderror" id="number" name="number" value="{{ $job->number }}">
                            @if ($errors->has('number'))
                                <span class="text-danger">{{ $errors->first('number') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="fault" class="col-md-4 col-form-label text-md-end text-start">Reported Fault</label>
                        <div class="col-md-6">
                            <textarea name="fault" class="form-control @error('fault') is-invalid @enderror" id="fault" cols="30" rows="3">{!! nl2br($job->fault) !!}</textarea>
                            @if ($errors->has('fault'))
                                <span class="text-danger">{{ $errors->first('fault') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start">Site Address</label>
                        <div class="col-md-6">
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address" cols="30" rows="3">{!! nl2br($job->address) !!}</textarea>
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="contactName" class="col-md-4 col-form-label text-md-end text-start">Contact Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('contactName') is-invalid @enderror" id="contactName" name="contactName" value="{{ $job->contactName }}">
                            @if ($errors->has('contactName'))
                                <span class="text-danger">{{ $errors->first('contactName') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="contactNo" class="col-md-4 col-form-label text-md-end text-start">Contact No#</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('contactNo') is-invalid @enderror" id="contactNo" name="contactNo" value="{{ $job->contactNo }}">
                            @if ($errors->has('contactNo'))
                                <span class="text-danger">{{ $errors->first('contactNo') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status_" class="col-md-4 col-form-label text-md-end text-start">Job Status:</label>
                        <div class="col-md-6">
                            <select name="status" id="status" class="form-control">
                                <option value="1"{{($job->status) ? " selected" : ""}} style="{{$colours['warning']}}; color:#ffffff">Open</option>
                                <option value="0"{{(!$job->status) ? " selected" : ""}} style="{{$colours['success']}}; color:#ffffff">Closed</option>
                            </select>
                            @if ($errors->has('status_1'))
                                <span class="text-danger">{{ $errors->first('status_1') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status_" class="col-md-4 col-form-label text-md-end text-start">Jobsheet Status:</label>
                        <div class="col-md-6">
                            <select name="status_1" id="status_1" class="form-control">
                                @foreach ($status_1 as $row)
                                    <option style="{{$colours[$row->colour]}}; color:#ffffff" value="{{$row->id}}"{{($row->id == $job->status_3) ? " selected" : ""}}>{{$row->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status_1'))
                                <span class="text-danger">{{ $errors->first('status_1') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status_3" class="col-md-4 col-form-label text-md-end text-start">Photo Status:</label>
                        <div class="col-md-6">
                            <select name="status_3" id="status_3" class="form-control">
                                @foreach ($status_3 as $row)
                                    <option style="{{$colours[$row->colour]}}; color:#ffffff" value="{{$row->id}}"{{($row->id == $job->status_3) ? " selected" : ""}}>{{$row->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status_3'))
                                <span class="text-danger">{{ $errors->first('status_3') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status_2" class="col-md-4 col-form-label text-md-end text-start">Incoming Invoice Status:</label>
                        <div class="col-md-6">
                            <select name="status_2" id="status_2" class="form-control">
                                @foreach ($status_2 as $row)
                                    <option style="{{$colours[$row->colour]}}; color:#ffffff" value="{{$row->id}}"{{($row->id == $job->status_2) ? " selected" : ""}}>{{$row->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status_2'))
                                <span class="text-danger">{{ $errors->first('status_2') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status_4" class="col-md-4 col-form-label text-md-end text-start">Outgoing Invoice/Claim Status#</label>
                        <div class="col-md-6">
                            <select name="status_4" id="status_4" class="form-control">
                                @foreach ($status_4 as $row)
                                    <option style="{{$colours[$row->colour]}}; color:#ffffff" value="{{$row->id}}"{{($row->id == $job->status_4) ? " selected" : ""}}>{{$row->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status_4'))
                                <span class="text-danger">{{ $errors->first('status_4') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update job">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
