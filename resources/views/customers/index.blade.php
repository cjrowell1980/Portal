@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">status List</div>
    <div class="card-body">
        @can('create-customer')
            <a href="{{ route('customers.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Customer</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col" width="50px">#</th>
                <th scope="col" width="150px">Syrinx Acc#</th>
                <th scope="col">Name</th>
                <th scope="col" width="250px">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $row)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $row->syrinx }}</td>
                    <td>{{ $row->name }}</td>
                    <td class="float-center">
                        <form action="{{ route('customers.destroy', $row->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('customers.show', $row->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-customer')
                                <a href="{{ route('customers.edit', $row->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-customer')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this customer?');"><i class="bi bi-trash"></i> Delete</button>
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

        {{ $customers->links() }}

    </div>
</div>
@endsection
