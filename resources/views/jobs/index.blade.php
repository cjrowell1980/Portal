@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Machine List</div>
    <div class="card-body">
        @can('create-customer')
        {{--
            <a href="{{ route('machines.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Machine</a>
        --}}
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col" width="50px">#</th>
                <th scope="col">Job</th>
                <th scope="col">Stock</th>
                <th scope="col">Machine</th>
                <th scope="col" colspan="2">Status</th>
                <th scope="col" width="220px">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jobs as $row)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $row->number }}</td>
                    <td>{{ $row->getMachine->stock }}</td>
                    <td>{{ $row->getMachine->make . ' ' . $row->getMachine->model }}</td>
                    <td>{{ $row->getStatus1->name }}</td>
                    <td>{{ $row->getStatus2->name }}</td>
                    <td class="float-center">
                        <form action="{{ route('jobs.destroy', $row->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('jobs.show', $row->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-jobs')
                                <a href="{{ route('jobs.edit', $row->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-jobs')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this jobs?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
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
