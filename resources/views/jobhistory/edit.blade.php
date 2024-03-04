@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Update Job History
                </div>
                <div class="float-end">
                    <a href="{{ route('jobs.show', $jobhistory->record) }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('jobhistory.update', $jobhistory->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="row">
                        <label for="datetime" class="col-md-4 col-form-label text-md-end text-start"><strong>Date & Time:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $jobhistory->created_at }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="old" class="col-md-4 col-form-label text-md-end text-start"><strong>Old:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {!! nl2br($jobhistory->old) !!}
                        </div>
                    </div>

                    <div class="row">
                        <label for="new" class="col-md-4 col-form-label text-md-end text-start"><strong>New:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {!! nl2br($jobhistory->new) !!}
                        </div>
                    </div>

                    <div class="row">
                        <label for="user" class="col-md-4 col-form-label text-md-end text-start"><strong>user:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $jobhistory->getUser->name }}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update JobHistory">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
