@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Machine
                </div>
                <div class="float-end">
                    <a href="{{ route('customers.show', $customerId) }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('machines.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Machine Owner#</label>
                        <div class="col-md-6">
                            <input type="hidden" name="customer" id="customer" value="{{ $customerId }}">
                            <input type="text" name="customerName" id="customerName" class="form-control" value="{{ $customers->firstWhere('id', $customerId)->name }}" readonly="" disabled="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Stock No#</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock') }}">
                            @if ($errors->has('stock'))
                                <span class="text-danger">{{ $errors->first('stock') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Fleet No#</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('asset') is-invalid @enderror" id="asset" name="asset" value="{{ old('asset') }}">
                            @if ($errors->has('asset'))
                                <span class="text-danger">{{ $errors->first('asset') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Serial No#</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('serial') is-invalid @enderror" id="serial" name="serial" value="{{ old('serial') }}">
                            @if ($errors->has('serial'))
                                <span class="text-danger">{{ $errors->first('serial') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Make</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('make') is-invalid @enderror" id="make" name="make" value="{{ old('make') }}">
                            @if ($errors->has('make'))
                                <span class="text-danger">{{ $errors->first('make') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Model</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" value="{{ old('model') }}">
                            @if ($errors->has('model'))
                                <span class="text-danger">{{ $errors->first('model') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Year of Manufacture</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('yom') is-invalid @enderror" id="yom" name="yom" value="{{ old('yom') }}">
                            @if ($errors->has('yom'))
                                <span class="text-danger">{{ $errors->first('yom') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Machine">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
