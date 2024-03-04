@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div>

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Engineer Information
                </div>
                <div class="float-end">
                    <form action="{{ route('engineers.destroy', $engineer->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('engineers.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                        @can('edit-engineers')
                            <a href="{{ route('engineers.edit', $engineer->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                        @endcan
                        @can('delete-engineers')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this customer?');"><i class="bi bi-trash"></i> Delete
                        @endcan
                    </form>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <label for="short" class="col-md-4 col-form-label text-md-end text-start"><strong>Short Name:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $engineer->short }}
                    </div>
                </div>

                <div class="row">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $engineer->name }}
                    </div>
                </div>

                <div class="row">
                    <label for="email" class="col-md-4 col-form-label text-md-end text-start"><strong>eMail:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $engineer->email }}
                    </div>
                </div>

                <div class="row">
                    <label for="mobile" class="col-md-4 col-form-label text-md-end text-start"><strong>Mobile:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $engineer->mobile }}
                    </div>
                </div>

                <div class="row">
                    <label for="invoice" class="col-md-4 col-form-label text-md-end text-start"><strong>Invoice Address:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {!! nl2br($engineer->invoice) !!}
                    </div>
                </div>

                <div class="row">
                    <label for="shipping" class="col-md-4 col-form-label text-md-end text-start"><strong>Shipping Address:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {!! nl2br($engineer->shipping) !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
