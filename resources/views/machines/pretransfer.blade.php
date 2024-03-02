@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Transfer Machine
                </div>
                <div class="float-end">
                    <a href="{{ route('machines.show', $machine->id) }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('machines.transfer', $machine->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Current Owner</label>
                        <div class="col-md-6">
                            <input type="text" name="old" id="old" class="form-control" readonly="readonly" value="{{ $machine->getCustomer->name }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Year of Manufacture</label>
                        <div class="col-md-6">
                            <select name="customer" id="customer" class="form-control">
                                @foreach ($customers as $customer )
                                    @if ($machine->getCustomer->id != $customer->id)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">New Fleet No#</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('asset') is-invalid @enderror" id="asset" name="asset" value="{{ $machine->asset }}">
                            @if ($errors->has('asset'))
                                <span class="text-danger">{{ $errors->first('asset') }}</span>
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
