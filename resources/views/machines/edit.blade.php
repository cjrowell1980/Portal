@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Machine
                </div>
                <div class="float-end">
                    <a href="{{ route('machines.show', $machine->id) }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('machines.update', $machine->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Owner</label>
                        <div class="col-md-6">
                            <input type="hidden" name="customer" id="customer" value="{{ $machine->getCustomer->id }}">
                          <input type="text" class="form-control" id="customerName" name="customerName" value="{{ $machine->getCustomer->name }}" readonly="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Stock No#</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ $machine->stock }}">
                            @if ($errors->has('stock'))
                                <span class="text-danger">{{ $errors->first('stock') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Fleet No#</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('asset') is-invalid @enderror" id="asset" name="asset" value="{{ $machine->asset }}">
                            @if ($errors->has('asset'))
                                <span class="text-danger">{{ $errors->first('asset') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Serial No#</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control text-uppercase @error('serial') is-invalid @enderror" id="serial" name="serial" value="{{ $machine->serial }}">
                            @if ($errors->has('serial'))
                                <span class="text-danger">{{ $errors->first('serial') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Make</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('make') is-invalid @enderror" id="make" name="make" value="{{ $machine->make }}">
                            @if ($errors->has('make'))
                                <span class="text-danger">{{ $errors->first('make') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Model</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" value="{{ $machine->model }}">
                            @if ($errors->has('model'))
                                <span class="text-danger">{{ $errors->first('model') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Year of Manufacture</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('yom') is-invalid @enderror" id="yom" name="yom" value="{{ $machine->yom }}">
                            @if ($errors->has('yom'))
                                <span class="text-danger">{{ $errors->first('yom') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update Machine">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
