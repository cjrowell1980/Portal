@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div>

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Job Information
                </div>
                <div class="float-end">
                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('machines.show', $job->getMachine->id) }}" class="btn btn-primary btn-sm">&larr; Back</a>
                        @can('edit-jobs')
                            <a href="{{ route('customers.edit', $job->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                        @endcan
                        @can('delete-jobs')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this job?');"><i class="bi bi-trash"></i> Delete
                        @endcan
                    </form>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="parent" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            a
                        </div>
                    </div>

                    <div class="row">
                        <label for="order" class="col-md-4 col-form-label text-md-end text-start"><strong>Syrinx Acc:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            a
                        </div>
                    </div>

            </div>
        </div>

    </div>
</div>

@endsection
