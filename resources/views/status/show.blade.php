@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Status Information
                </div>
                <div class="float-end">
                    <a href="{{ route('status.edit', $status->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                    <a href="{{ route('status.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="parent" class="col-md-4 col-form-label text-md-end text-start"><strong>Parent:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            @switch($status->parent)

                                @case("1")
                                    Jobsheet Status
                                    @break

                                    @case("2")
                                        Photo Status
                                        @break

                                    @case("3")
                                        Incoming Invoice Status
                                        @break

                                    @case("4")
                                        Outgoing Invoice / Warranty Claim Status
                                        @break
                            @endswitch
                            {{ ($status->parent == '1') ? __("Primary") : __("Secondary") }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="order" class="col-md-4 col-form-label text-md-end text-start"><strong>Display Order:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $status->order }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $status->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Description:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $status->description }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="colour" class="col-md-4 col-form-label text-md-end text-start"><strong>Colour:</strong></label>
                        <div class="col-md-6 bg-{{$status->colour}} text-white text-center" style="line-height: 35px;">
                            {{ $status->colour }}
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>

@endsection
