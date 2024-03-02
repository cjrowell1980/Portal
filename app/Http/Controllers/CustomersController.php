<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Http\Requests\StoreCustomersRequest;
use App\Http\Requests\UpdateCustomersRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomersController extends Controller
{
    /**
     * Instantiate a new StatusController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-customer|edit-customer|delete-customer', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-customer', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-customer', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-customer', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('customers.index', [
            'customers' => Customers::orderBy('id', 'DESC')->paginate(env('APP_PAGE_FULL'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomersRequest $request): RedirectResponse
    {
        Customers::create($request->all());
        return redirect()->route('customers.index')
            ->withSuccess('New customer has been successfully saved.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customers $customer): View
    {
        $machines = $customer->getMachines()->paginate(env('APP_PAGE_HALF'));
        return view('customers.show', [
            'customer'  => $customer,
            'machines'  => $machines,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customers $customer): View
    {
        return view('customers.edit', [
            'customer'  => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomersRequest $request, Customers $customer): RedirectResponse
    {
        $customer->update($request->all());
        return redirect()->route('customers.show', $customer->id)->withSuccess('Customer has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customers $customer): RedirectResponse
    {
        $customer->delete();
        return redirect()->route('customers.index')
            ->withSuccess('Customer has been deleted successfully');
    }
}
