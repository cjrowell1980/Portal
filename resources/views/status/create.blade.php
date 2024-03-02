@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Status
                </div>
                <div class="float-end">
                    <a href="{{ route('status.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('status.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="parent" class="col-md-4 col-form-label text-md-end text-start">Type</label>
                        <div class="col-md-6">
                            <select name="parent" id="parent" class="form-select @error('parent') is-invalid @enderror">
                                <option value="1">Primary</option>
                                <option value="2">Secondary</option>
                            </select>
                            @if ($errors->has('parent'))
                                <span class="text-danger">{{ $errors->first('parent') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="order" class="col-md-4 col-form-label text-md-end text-start">Display Order</label>
                        <div class="col-md-6">
                        <input type="text" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order') }}" placeholder="hint: low numbers display first">
                            @if ($errors->has('order'))
                                <span class="text-danger">{{ $errors->first('order') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Status">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
