@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Manage Engineers</div>
    <div class="card-body">
        @can('create-engineers')
            <a href="{{ route('engineers.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Engineer</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col" width="50px">#</th>
                <th scope="col">Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">eMail</th>
                <th scope="col" width="350px">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($engineers as $row)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->mobile }}</td>
                    <td>{{ $row->email }}</td>
                    <td class="float-center">
                        <form action="{{ route('engineers.destroy', $row->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="mailto:{{ $row->email }}" class="btn btn-info btn-sm"><i class="bi bi-envelope-at"></i> Send eMail</a>

                            <a href="{{ route('engineers.show', $row->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-engineers')
                                <a href="{{ route('engineers.edit', $row->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-engineers')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this engineer?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="3">
                        <span class="text-danger text-center fw-bold">
                            <p>No Customers Found!</p>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $engineers->links() }}

    </div>
</div>
@endsection
