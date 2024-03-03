<?php

namespace App\Http\Controllers;

use App\Models\Machines;
use App\Models\Customers;
use App\Http\Requests\StoreMachinesRequest;
use App\Http\Requests\UpdateMachinesRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MachinesController extends Controller
{
    /**
     * Instantiate a new StatusController instance.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-machines|edit-machines|delete-machines', ['only' => ['index','show']]);
       $this->middleware('permission:create-machines', ['only' => ['create','store']]);
       $this->middleware('permission:edit-machines', ['only' => ['edit','update', 'transfer', 'pretransfer']]);
       $this->middleware('permission:delete-machines', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('machines.index', [
            'machines'  => Machines::latest()->paginate(env('APP_PAGE_FULL')),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        return view('machines.create', [
            'customers'     => Customers::all(),
            'customerId'    => $request->id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMachinesRequest $request): RedirectResponse
    {
        Machines::create($request->all());
        return redirect()->route('customers.show', $request->input('customer'))
            ->withSuccess('Machine has been successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Machines $machine): View
    {
        return view('machines.show', [
            'machine'   => $machine,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Machines $machine): View
    {
        return view('machines.edit',[
        'machine'   => $machine,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMachinesRequest $request, Machines $machine): RedirectResponse
    {
        $machine->update($request->all());
        return redirect()->route('machines.show', $machine->id)
            ->withSuccess('Machine has been successfully updated.');
    }

    /**
     * preTransfer, display form to prepare fo machine transfer
     *
     * @param Request $request
     * @return View
     */
    public function preTransfer(Request $request): View
    {
        $machine    = Machines::find($request->id);
        $customers  = Customers::all();
        return view('machines.pretransfer', [
            'machine'   => $machine,
            'customers'  => $customers,
        ]);
    }

    /**
     * transfer, transfer machine to new customer
     *
     * @param UpdateMachinesRequest $request
     * @param Machines $machine
     * @return RedirectResponse
     */
    public function transfer(Request $request): RedirectResponse
    {
        $machine    = Machines::find($request->id);
        $machine->update($request->all());
        return redirect()->route('machines.show', $request->id)
            ->withSuccess('Machine has been transferred successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Machines $machine): RedirectResponse
    {
        $machine->delete();
        return redirect()->route('customers.index')
            ->withSuccess('Machine has been successfully deleted');
    }
}
