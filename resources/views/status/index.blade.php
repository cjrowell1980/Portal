@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">status List</div>
    <div class="card-body">
        @can('create-status')
            <a href="{{ route('status.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New status</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" width="50px">#</th>
                    <th scope="col">Group</th>
                    <th scope="col">Order</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col" width="220px">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($status as $row)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ ($row->parent == '1') ? __("Primary") : __("Secondary") }}</td>
                    <td>{{ $row->order }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->description }}</td>
                    <td>
                        <form action="{{ route('status.destroy', $row->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('status.show', $row->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-status')
                                <a href="{{ route('status.edit', $row->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-status')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this status?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="6">
                        <span class="text-danger text-center fw-bold">
                            <p>No Statuses Found!</p>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $status->links() }}

    </div>
</div>
@endsection
