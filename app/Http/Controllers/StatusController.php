<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class StatusController extends Controller
{
    /**
     * Instantiate a new StatusController instance.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-status|edit-status|delete-status', ['only' => ['index','show']]);
       $this->middleware('permission:create-status', ['only' => ['create','store']]);
       $this->middleware('permission:edit-status', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-status', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('status.index', [
            'status' => Status::latest()->paginate(env('APP_PAGE_FULL'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('status.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatusRequest $request): RedirectResponse
    {
        Status::create($request->all());
        return redirect()->route('status.index')
                ->withSuccess('New status has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status): View
    {
        return view('status.show', [
            'status' => $status
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status): View
    {
        return view('status.edit', [
            'status' => $status
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status): RedirectResponse
    {
        $status->update($request->all());
        return redirect()->route('status.show', $status->id)
                ->withSuccess('Status has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status): RedirectResponse
    {
        $status->delete();
        return redirect()->route('status.index')
                ->withSuccess('Status has been deleted successfully.');
    }
}
