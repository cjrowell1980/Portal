@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    New Job Settings
                </div>
                <div class="float-end">
                    <a href="{{ route('settings.edit', 1) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row mb-3">
                    <label for="status1" class="col-md-4 col-form-label text-md-end text-start"><strong>Jobsheet:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        <span class="btn btn-{{ $setting->getStatus_1->colour }} w-25">{{ $setting->getStatus_1->name }}</span>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="status3" class="col-md-4 col-form-label text-md-end text-start"><strong>Photo:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        <span class="btn btn-{{ $setting->getStatus_3->colour }} w-25">{{ $setting->getStatus_3->name }}</span>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="status2" class="col-md-4 col-form-label text-md-end text-start"><strong>Incoming Invoice:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        <span class="btn btn-{{ $setting->getStatus_2->colour }} w-25">{{ $setting->getStatus_2->name }}</span>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="status4" class="col-md-4 col-form-label text-md-end text-start"><strong>Outgoing Invoice/Claim:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        <span class="btn btn-{{ $setting->getStatus_4->colour }} w-25">{{ $setting->getStatus_4->name }}</span>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
