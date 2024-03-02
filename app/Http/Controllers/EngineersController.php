<?php

namespace App\Http\Controllers;

use App\Models\Engineers;
use App\Http\Requests\StoreEngineersRequest;
use App\Http\Requests\UpdateEngineersRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EngineersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('engineers.index', [
            'engineers' => Engineers::latest()->paginate(env('APP_PAGE_FULL')),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('engineers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEngineersRequest $request): RedirectResponse
    {
        $engineer = Engineers::create($request->all());
        return redirect()->route('engineers.show', $engineer->id)
            ->withSuccess('Engineer has been created succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Engineers $engineer): View
    {
        return view('engineers.show', [
            'engineer'  => $engineer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Engineers $engineer): View
    {
        return view('engineers.edit', [
            'engineer'  => $engineer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEngineersRequest $request, Engineers $engineer)
    {
        $engineer->update($request->all());
        return redirect()->route('engineers.show', $engineer->id)
            ->withSuccess('Engineer has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Engineers $engineer): RedirectResponse
    {
        $engineer->delete();
        return redirect()->route('engineers.index')
            ->withSuccess('Engineer has been successfully deleted.');
    }
}
