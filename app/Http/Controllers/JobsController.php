<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Status;
use App\Http\Requests\StoreJobsRequest;
use App\Http\Requests\UpdateJobsRequest;
use App\Models\Engineers;
use App\Models\JobHistory;
use App\Models\Machines;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('jobs.index', [
//            'jobs'  => Jobs::latest()->paginate(env('APP_PAGE_FULL')),
            'jobs'   => Jobs::where('status', 1)->orderBy('created_at', 'DESC')->paginate(env('APP_PAGE_FULL')), 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view('jobs.create', [
            'engineers' => Engineers::all(),
            'machine'   => Machines::find($request->id),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobsRequest $request): RedirectResponse
    {
        $job = Jobs::create($request->all());
        JobHistory::create(['field' => 'all', 'old' => 'N/A', 'new' => 'Job Created', 'user' => auth()->user()->id, 'record' => $job->id]);
        return redirect()->route('jobs.show', $job->id)
            ->withSuccess('The job has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jobs $job): View
    {
        return view('jobs.show', [
            'job'       => $job,
            'status_1'  => Status::where('parent', 1)->orderBy('order', 'ASC')->get(),
            'status_3'  => Status::where('parent', 3)->orderBy('order', 'ASC')->get(),
            'status_2'  => Status::where('parent', 2)->orderBy('order', 'ASC')->get(),
            'status_4'  => Status::where('parent', 4)->orderBy('order', 'ASC')->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jobs $job): View
    {
        return view('jobs.edit', [
            'job'   => $job
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobsRequest $request, Jobs $job): RedirectResponse
    {
        $job->update($request->all());
        return redirect()->route('jobs.show', [
            'job'   => $job
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jobs $job): RedirectResponse
    {
        $job->delete();
        return redirect()->route('machines.show', 1)
            ->withSuccess('Job has been successfully deleted.');
    }
}
