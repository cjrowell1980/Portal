@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Update Settings
                </div>
                <div class="float-end">
                    <a href="{{ route('settings.show', 1) }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.update', 1) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="status_1" class="col-md-4 col-form-label text-md-end text-start">Initial Jobsheet Status</label>
                        <div class="col-md-6">
                            <select name="status_1" id="status_1" class="form-control">
                                @foreach ($status_1 as $row)
                                    <option value="{{$row->id}}"{{($setting->status_1 == $row->id) ? " selected" : ""}}>{{$row->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status_1'))
                                <span class="text-danger">{{ $errors->first('status_1') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status_3" class="col-md-4 col-form-label text-md-end text-start">Initial Photo Status</label>
                        <div class="col-md-6">
                            <select name="status_3" id="status_3" class="form-control">
                                @foreach ($status_3 as $row)
                                    <option value="{{$row->id}}"{{($setting->status_3 == $row->id) ? " selected" : ""}}>{{$row->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status_3'))
                                <span class="text-danger">{{ $errors->first('status_3') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status_2" class="col-md-4 col-form-label text-md-end text-start">Initial Incoming Invoice Status</label>
                        <div class="col-md-6">
                            <select name="status_2" id="status_2" class="form-control">
                                @foreach ($status_2 as $row)
                                    <option value="{{$row->id}}"{{($setting->status_2 == $row->id) ? " selected" : ""}}>{{$row->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status_2'))
                                <span class="text-danger">{{ $errors->first('status_2') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status_4" class="col-md-4 col-form-label text-md-end text-start">Initial Outgoing Invoice Status</label>
                        <div class="col-md-6">
                            <select name="status_4" id="status_4" class="form-control">
                                @foreach ($status_4 as $row)
                                    <option value="{{$row->id}}"{{($setting->status_4 == $row->id) ? " selected" : ""}}>{{$row->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status_4'))
                                <span class="text-danger">{{ $errors->first('status_4') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update Settings">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
