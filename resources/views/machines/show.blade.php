@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div>

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    {{ $machine->make }} {{ $machine->model }} - {{ $machine->getCustomer->name }}
                </div>
                <div class="float-end">
                    <form action="{{ route('machines.destroy', $machine->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('customers.show', $machine->getCustomer->id) }}" class="btn btn-primary btn-sm">&larr; Back</a>
                        @can('edit-machines')
                            <a href="{{ route('machines.edit', $machine->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                        @endcan
                        @can('delete-machines')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this machine?');"><i class="bi bi-trash"></i> Delete</button>
                        @endcan
                        @can('edit-machines')
                            <a href="{{ route('machines.pretransfer', $machine->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-arrow-left-right"></i> Transfer</a>
                        @endcan
                    </form>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="parent" class="col-md-4 col-form-label text-md-end text-start"><strong>Stock Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $machine->stock }}
                        </div>
                    </div>
                    @empty(!$machine->asset)
                        <div class="row">
                            <label for="order" class="col-md-4 col-form-label text-md-end text-start"><strong>Fleet Ref:</strong></label>
                            <div class="col-md-6" style="line-height: 35px;">
                                {{ $machine->asset }}
                            </div>
                        </div>
                    @endempty
                    <div class="row">
                        <label for="order" class="col-md-4 col-form-label text-md-end text-start"><strong>Serial Number:</strong></label>
                        <div class="col-md-6 text-uppercase" style="line-height: 35px;">
                            {{ $machine->serial }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="order" class="col-md-4 col-form-label text-md-end text-start"><strong>Year of Manufactuer:</strong></label>
                        <div class="col-md-6 text-uppercase" style="line-height: 35px;">
                            {{ $machine->yom }}
                        </div>
                    </div>

            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <div class="float-start">
                    Jobs
                </div>
                <div class="float-end">

                    <a href="{{ route('jobs.create', 'id='.$machine->id) }}" class="btn btn-sm btn-success">Add Job</a>

                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <th scope="col" width="1%">#</th>
                        <th scope="col" width="100px">Job No#</th>
                        <th scope="col" width="100px" class="text-center">Status</th>
                        <th scope="col">Fault</th>
                        <th scope="col" width="75px" class="text-center">Days</th>
                        <th scope="col" width="250px">Action</th>
                    </thead>
                    <tbody>
                        @forelse ($machine->getJobs as $row )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->number }}</td>
                                <td class="text-center">
                                    @if ($row->status)
                                        <span class='badge rounded-pill bg-warning w-75'>Open</span>
                                    @else
                                        <span class='badge rounded-pill bg-success w-75'>Closed</span>                                    
                                    @endif
                                </td>
                                <td>{{ $row->fault }}</td>
                                <td class="text-center">
                                    @if ($row->status == 0) {{-- Job Closed --}}
                                        {{ $row->updated_at->diffInDays($row->created_at) }}
                                    @else {{-- Job Open --}}
                                        {{ now()->diffInDays($row->created_at)}}
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('jobs.destroy', $row->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('jobs.show', $row->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                        @if ($row->status == 1)
                                            @can('edit-jobs')
                                                <a href="{{ route('jobs.edit', $row->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>                                                
                                            @endcan
                                            @can('delete-jobs')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this machine?');"><i class="bi bi-trash"></i> Delete</button>
                                            @endcan
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @empty
                        <td colspan="5">
                            <span class="text-danger text-center fw-bold">
                                <p>No Jobs Found!</p>
                            </span>
                        </td>
                        @endforelse



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
