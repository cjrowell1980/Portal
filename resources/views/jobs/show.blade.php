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
                        @if ($job->status == 1)
                            @can('edit-jobs')
                                <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>                                
                            @endcan
                            @can('delete-jobs')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this job?');"><i class="bi bi-trash"></i> Delete
                            @endcan
                        @endif
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
                        <label for="fault" class="col-md-4 col-form-label text-md-end text-start"><strong>Date Reported:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $job->created_at->format('d M Y') }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="fault" class="col-md-4 col-form-label text-md-end text-start"><strong>{{ ($job->status == 0) ? "Date Closed" : "Days Open"}}:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ ($job->status == 0) ? $job->updated_at->format('d M Y') . " (" . $job->updated_at->diffInDays($job->created_at) . "days)" : now()->diffInDays($job->created_at) }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="status" class="col-md-4 col-form-label text-md-end text-start"><strong>Statuses:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{-- Status 1 = Jobsheet --}}
                            <span class="badge rounded-pill bg-{{$job->getStatus1->colour}} w-23">Jobsheet {{$job->getStatus1->name}}</span>
                            {{-- Status 3 = Photos --}}
                            <span class="badge rounded-pill bg-{{$job->getStatus3->colour}} w-23">Photos {{$job->getStatus3->name}}</span>
                            {{-- Status 2 = Incoming Invoice--}}
                            <span class="badge rounded-pill bg-{{$job->getStatus2->colour}} w-23">Invoice In {{$job->getStatus2->name}}</span>
                            {{-- Status 4 = Outgoing Invoice --}}
                            <span class="badge rounded-pill bg-{{$job->getStatus4->colour}} w-23">Invoice Out {{$job->getStatus4->name}}</span>
                        </div>
                    </div>

            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <div class="float-start">
                    Visits
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
