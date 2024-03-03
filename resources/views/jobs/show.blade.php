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
                        <label for="number" class="col-md-4 col-form-label text-md-end text-start"><strong>Job Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $job->number }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="status" class="col-md-4 col-form-label text-md-end text-start"><strong>Status:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">    
                            @if ($job->status)
                                <span class="badge rounded-pill bg-warning w-25">Open</span>    
                            @else
                                <span class="badge rounded-pill bg-success 2-25">Closed</span>                            
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <label for="machine" class="col-md-4 col-form-label text-md-end text-start"><strong>Machine:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $job->getMachine->stock . " - " . $job->getMachine->make . " " . $job->getMachine->model }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="fault" class="col-md-4 col-form-label text-md-end text-start"><strong>Reported Fault:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $job->fault }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="status" class="col-md-4 col-form-label text-md-end text-start"><strong>Statuses:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <span class="badge rounded-pill bg-info">Jobsheet Pending</span> 
                            <span class="badge rounded-pill bg-info">Invoice Pending</span> 
                            <span class="badge rounded-pill bg-info">Pictures Pending</span> 
                            <span class="badge rounded-pill bg-info">Warranty Pending</span>
                        </div>
                    </div>

            </div>
        </div>

    </div>
</div>

@endsection
