@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Job
                </div>
                <div class="float-end">
                    <a href="{{ route('machines.show', $machine->id) }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('jobs.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="machineName" class="col-md-4 fol-form-label text-md-end text-start">Machine</label>
                        <div class="col-md-6">
                            <input type="hidden" name="machine" id="machine" value="{{ $machine->id }}">
                            <input type="text" name="machineName" id="machineName" class="form-control" value="{{ $machine->stock }} - {{ $machine->make }} {{ $machine->model }} - {{ $machine->getCustomer->name }}" readonly="" disabled="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="number" class="col-md-4 col-form-label text-md-end text-start">Syrinx Job No#</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('number') is-invalid @enderror" id="number" name="number" value="{{ old('number') }}">
                            @if ($errors->has('number'))
                                <span class="text-danger">{{ $errors->first('number') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="fault" class="col-md-4 col-form-label text-md-end text-start">Reported Fault</label>
                        <div class="col-md-6">
                            <textarea name="fault" class="form-control @error('fault') is-invalid @enderror" id="fault" cols="30" rows="3">{{ old('fault') }}</textarea>
                            @if ($errors->has('fault'))
                                <span class="text-danger">{{ $errors->first('fault') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start">Site Address</label>
                        <div class="col-md-6">
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address" cols="30" rows="3">{{ old('address') }}</textarea>
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="contactName" class="col-md-4 col-form-label text-md-end text-start">Contact Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('contactName') is-invalid @enderror" id="contactName" name="contactName" value="{{ old('contactName') }}">
                            @if ($errors->has('contactName'))
                                <span class="text-danger">{{ $errors->first('contactName') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="contactNo" class="col-md-4 col-form-label text-md-end text-start">Contact No#</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('contactNo') is-invalid @enderror" id="contactNo" name="contactNo" value="{{ old('contactNo') }}">
                            @if ($errors->has('contactNo'))
                                <span class="text-danger">{{ $errors->first('contactNo') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Job">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
