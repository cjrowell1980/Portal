@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Status Lists</div>
    <div class="card-body">
        @can('create-status')
            <a href="{{ route('status.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New status</a>
        @endcan

        <div class="accordion" id="accordionStatus">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Jobsheet Statuses (in display order)
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionStatus">
                    <div class="accordion-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" width="50px">#</th>
                                    <th scope="col" width="200px">Status</th>
                                    <th scope="col">Description</th>
                                    <th scope="col" width="250px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($status1 as $row)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td class="text-center"><span class="badge w-75 rounded-pill bg-{{$row->colour}}">{{$row->name}}</span></td>
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
                        {{ $status1->links() }}
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Photo Statuses (in display order)
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionStatus">
                    <div class="accordion-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" width="50px">#</th>
                                    <th scope="col" width="200px">Status</th>
                                    <th scope="col">Description</th>
                                    <th scope="col" width="250px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($status3 as $row)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td class="text-center"><span class="badge w-75 rounded-pill bg-{{$row->colour}}">{{$row->name}}</span></td>
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
                        {{ $status3->links() }}
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Incoming Invoice Statuses (in display order)
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionStatus">
                    <div class="accordion-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" width="50px">#</th>
                                    <th scope="col" width="200px">Status</th>
                                    <th scope="col">Description</th>
                                    <th scope="col" width="250px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($status2 as $row)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td class="text-center"><span class="badge w-75 rounded-pill bg-{{$row->colour}}">{{$row->name}}</span></td>
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
                        {{ $status2->links() }}
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Outgoing Invoice / Warranty Claim Statuses (in display order)
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionStatus">
                    <div class="accordion-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" width="50px">#</th>
                                    <th scope="col" width="200px">Status</th>
                                    <th scope="col">Description</th>
                                    <th scope="col" width="250px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($status4 as $row)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td class="text-center"><span class="badge w-75 rounded-pill bg-{{$row->colour}}">{{$row->name}}</span></td>
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
                        {{ $status4->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
