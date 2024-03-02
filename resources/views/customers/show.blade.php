@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div>

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Customer Information
                </div>
                <div class="float-end">
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('customers.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                        @can('edit-customer')
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                        @endcan
                        @can('delete-customer')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this customer?');"><i class="bi bi-trash"></i> Delete
                        @endcan
                    </form>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="parent" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $customer->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="order" class="col-md-4 col-form-label text-md-end text-start"><strong>Syrinx Acc:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $customer->syrinx }}
                        </div>
                    </div>

            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <div class="float-start">
                    Machines
                </div>
                <div class="float-end">

                    <a href="{{ route('machines.create', "id=".$customer->id) }}" class="btn btn-sm btn-success">Add Machine</a>

                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <th scope="col" width="1%">#</th>
                        <th scope="col" width="1%">Id</th>
                        <th scope="col">Make</th>
                        <th scope="col">Model</th>
                        <th scope="col" width="250px">Action</th>
                    </thead>
                    <tbody>
                        @forelse ($machines as $machine)
                        <tr>
                            <th scope="row">{{  $loop->iteration}}</th>
                            <td>{{ $machine->stock }}</td>
                            <td>{{ $machine->make }}</td>
                            <td>{{ $machine->model }}</td>
                            <td>
                                <form action="{{ route('machines.destroy', $machine->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('machines.show', $machine->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i> Show</a>
                                    @can('edit-machines')
                                        <a href="{{ route('machines.edit', $machine->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
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
            </div>
        </div>
    </div>
</div>

@endsection
