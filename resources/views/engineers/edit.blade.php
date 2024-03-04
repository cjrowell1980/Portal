@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Update Engineer
                </div>
                <div class="float-end">
                    <a href="{{ route('engineers.show', $engineer->id) }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('engineers.update', $engineer->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="short" class="col-md-4 col-form-label text-md-end text-start">Short</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('short') is-invalid @enderror" id="short" name="short" value="{{ $engineer->short }}">
                            @if ($errors->has('short'))
                                <span class="text-danger">{{ $errors->first('short') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $engineer->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">eMail Address</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $engineer->email }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="mobile" class="col-md-4 col-form-label text-md-end text-start">Mobile No#</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ $engineer->mobile }}">
                            @if ($errors->has('mobile'))
                                <span class="text-danger">{{ $errors->first('mobile') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="invoice" class="col-md-4 col-form-label text-md-end text-start">Invoice Address</label>
                        <div class="col-md-6">
                            <textarea name="invoice" id="invoice" cols="30" rows="5" class="form-control @error('invoice') is-invalid @enderror">{!! $engineer->invoice !!}</textarea>
                            @if ($errors->has('invoice'))
                                <span class="text-danger">{{ $errors->first('invoice') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="shipping" class="col-md-4 col-form-label text-md-end text-start">Shipping Address</label>
                        <div class="col-md-6">
                            <textarea name="shipping" id="shipping" cols="30" rows="5" class="form-control @error('shipping') is-invalid @enderror">{!! $engineer->shipping !!}</textarea>
                            @if ($errors->has('shipping'))
                                <span class="text-danger">{{ $errors->first('shipping') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update engineer">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
