@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Status
                </div>
                <div class="float-end">
                    <a href="{{ route('status.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('status.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="parent" class="col-md-4 col-form-label text-md-end text-start">Status Category</label>
                        <div class="col-md-6">
                            <select name="parent" id="parent" class="form-select @error('parent') is-invalid @enderror">
                                <option value="1"{{($status->parent == "1") ? " selected" : ""}}>Jobsheets</option>
                                <option value="2"{{($status->parent == "2") ? " selected" : ""}}>Photos</option>
                                <option value="3"{{($status->parent == "3") ? " selected" : ""}}>Incoming Invoices</option>
                                <option value="4"{{($status->parent == "4") ? " selected" : ""}}>Outgoing Invoices</option>
                            </select>
                            @if ($errors->has('parent'))
                                <span class="text-danger">{{ $errors->first('parent') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="order" class="col-md-4 col-form-label text-md-end text-start">Display Order</label>
                        <div class="col-md-6">
                        <input type="text" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ $status->order }}" placeholder="hint: low numbers display first">
                            @if ($errors->has('order'))
                                <span class="text-danger">{{ $errors->first('order') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $status->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $status->description }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="parent" class="col-md-4 col-form-label text-md-end text-start">Status Colour</label>
                        <div class="col-md-6 ">
                            <select name="colour" id="colour" class="form-control">
                                <option value="primary"{{($status->colour == "primary") ? " selected" : ""}}>Primary</option>
                                <option value="secondary"{{($status->colour == "secondary") ? " selected" : ""}}>Secondary</option>
                                <option value="success"{{($status->colour == "success") ? " selected" : ""}}>Success</option>
                                <option value="info"{{($status->colour == "info") ? " selected" : ""}}>Info</option>
                                <option value="warning"{{($status->colour == "warning") ? " selected" : ""}}>Warning</option>
                                <option value="danger"{{($status->colour == "danger") ? " selected" : ""}}>Danger</option>
                            </select>
                            @if ($errors->has('parent'))
                                <span class="text-danger">{{ $errors->first('parent') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <span class="badge bg-primary col-md-2">Primary</span>
                        <span class="badge bg-secondary col-md-2">Secondary</span>
                        <span class="badge bg-success col-md-2">Success</span>
                        <span class="badge bg-info col-md-2">Info</span>
                        <span class="badge bg-warning col-md-2">Warning</span>
                        <span class="badge bg-danger col-md-2">Danger</span>
                        
                    </div>
                     
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update Status">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
