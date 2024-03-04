<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Http\Requests\UpdateSettingsRequest;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SettingsController extends Controller
{
    /**
     * Initialise the settings controller
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:edit-settings', ['only' => ['edit', 'update', 'show']]);
    }


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
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Settings $setting): View
    {
        return view('settings.show', [
            'setting' => $setting,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $setting): View
    {
        return view('settings.edit', [
            'setting'   => $setting,
            'status_1'  => Status::where('parent', 1)->get(),
            'status_2'  => Status::where('parent', 2)->get(),
            'status_3'  => Status::where('parent', 3)->get(),
            'status_4'  => Status::where('parent', 4)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingsRequest $request, Settings $setting): RedirectResponse
    {
        $setting->update($request->all());
        return redirect()->route('settings.show', 1)
            ->withSuccess('Settings have been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
