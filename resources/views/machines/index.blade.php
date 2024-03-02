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
                <th scope="col">Stock</th>
                <th scope="col">Make</th>
                <th scope="col">Model</th>
                <th scope="col" width="220px">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($machines as $row)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $row->stock }}</td>
                    <td>{{ $row->make }}</td>
                    <td>{{ $row->model }}</td>
                    <td class="float-center">
                        <form action="{{ route('machines.destroy', $row->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('machines.show', $row->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-machines')
                                <a href="{{ route('machines.edit', $row->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-machines')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this machine?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="5">
                        <span class="text-danger text-center fw-bold">
                            <p>No Machines Found!</p>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $machines->links() }}

    </div>
</div>
@endsection
