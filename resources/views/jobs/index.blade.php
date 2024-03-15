@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Open Jobs</div>
    <div class="card-body">
        @can('create-customer')
        {{--
            <a href="{{ route('machines.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Machine</a>
        --}}
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col" width="30px" class="text-center">#</th>
                <th scope="col" width="80ox">Job No#</th>
                <th scope="col">Machine</th>
                <th scope="col">Fault</th>
                <th scope="col" width="50px" class="text-center">Days</th>
                <th scope="col" width="170px" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jobs as $row)
                <tr>
                    <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                    <td>{{ $row->number }}</td>
                    <td>{{ $row->getMachine->stock . " - " . $row->getMachine->make . ' ' . $row->getMachine->model . ' (' . $row->getMachine->getCustomer->name }})</td>
                    <td>{{ $row->fault }}</td>
                    <td class="text-center">{{ now()->diffInDays($row->created_at)}}</td>
                    <td class="text-center">
                        <a href="{{ route('jobs.show', $row->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                        @can('edit-jobs')
                            <a href="{{ route('jobs.edit', $row->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                        @endcan
                    </td>
                </tr>
                @empty
                    <td colspan="7">
                        <span class="text-center text-danger fw-bold">
                            <p>No Jobs Found!</p>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $jobs->links() }}

    </div>
</div>
@endsection
