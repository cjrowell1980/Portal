@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div>

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Job Visit - {{$visit->getJob->number}}
                </div>
                <div class="float-end">
                    <a href="{{ route('jobs.show', $visit->getJob->id) }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    @if ($visit->status == 1)
                        @can('edit-jobs')
                            <a href="{{ route('visits.edit', $visit->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>                                
                        @endcan
                    @endif
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="number" class="col-md-4 col-form-label text-md-end text-start"><strong>Job Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $visit->getJob->number }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="status" class="col-md-4 col-form-label text-md-end text-start"><strong>Status:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">    
                            @if ($visit->status)
                                <span class="badge rounded-pill bg-warning w-25">Open</span>    
                            @else
                                <span class="badge rounded-pill bg-success 2-25">Closed</span>                            
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <label for="fault" class="col-md-4 col-form-label text-md-end text-start"><strong>Outcome:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $visit->outcome }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="machine" class="col-md-4 col-form-label text-md-end text-start"><strong>Machine:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $visit->getMachine->stock . " - " . $visit->getMachine->make . " " . $visit->getMachine->model }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="fault" class="col-md-4 col-form-label text-md-end text-start"><strong>Date Created:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $job->created_at->format('d M Y') }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="fault" class="col-md-4 col-form-label text-md-end text-start"><strong>Date Scheduled:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $visit->scheduled->format('d M Y') }} - (x days)
                        </div>
                    </div>

                    <div class="row">
                        <label for="fault" class="col-md-4 col-form-label text-md-end text-start"><strong>Date Attended:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $visit->attended->format('d M Y') }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="fault" class="col-md-4 col-form-label text-md-end text-start"><strong>Report:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {!! nl2br($job->report) !!}
                        </div>
                    </div>

            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <div class="float-start">
                    Parts
                </div>
                <div class="float-end">
                    <!--<a href="#" class="btn btn-sm btn-success">Add </a>-->
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <th scope="col" width="1%">#</th>
                        <th scope="col" width="100px">Opened</th>
                        <th scope="col" width="100px">Scheduled</th>
                        <th scope="col" width="75px" class="text-center">Days</th>
                        <th scope="col" width="250px">Action</th>
                    </thead>
                    <tbody>
                            <tr>
                                <td>1</td>
                                <td>01 Mar 24</td>
                                <td>04 Mar 24</td>
                                <td><span class="badge rounded-pill bg-warning w-75">Open</span></td>
                                <td>
                                    <form action="#" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                        @if (1 == true)
                                            @can('edit-jobs')
                                                <a href="#" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>                                                
                                            @endcan
                                            @can('delete-jobs')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this machine?');"><i class="bi bi-trash"></i> Delete</button>
                                            @endcan
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        <!-- empty -->
                        <td colspan="6">
                            <span class="text-danger text-center fw-bold">
                                <p>No Visits Found!</p>
                            </span>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection
