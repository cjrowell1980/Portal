<?php

namespace App\Http\Controllers;

use App\Models\JobHistory;
use App\Http\Requests\StoreJobHistoryRequest;
use App\Http\Requests\UpdateJobHistoryRequest;

class JobHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JobHistory $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobHistory $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobHistoryRequest $request, JobHistory $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobHistory $history)
    {
        return redirect()->back()
            ->withErrors('Cannot delete audit history');
    }
}
