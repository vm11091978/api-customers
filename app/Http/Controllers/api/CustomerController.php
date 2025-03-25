<?php

namespace App\Http\Controllers\api;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();

        return response()->json([
            'status' => true,
            'customers' => $customers
        ]);
    }

    /**
     * The function is triggered when the POST-method is called.
     */
    public function action(StoreCustomerRequest $request)
    {
        if ($request->filled('action-show')) {
            $id = (int)$request->input('action-show');
            return $this->show($id);
        }

        if ($request->filled('action-update')) {
            $id = (int)$request->input('action-update');
            return $this->update($request, $id);
        }

        if ($request->filled('action-delete')) {
            $id = (int)$request->input('action-delete');
            return $this->destroy($id);
        }

        return $this->update($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    private function store($request)
    {
        $customer = Customer::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Customer Created successfully!",
            'customer' => $customer
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    private function show(int $id)
    {
        $customer = Customer::findOrFail($id);

        return response()->json([
            'status' => true,
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    private function update($request, int $id)
    {
        Customer::findOrFail($id)->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Customer $id Updated successfully!"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    private function destroy(int $id)
    {
        Customer::destroy($id);

        return response()->json([
            'status' => true,
            'message' => "Customer $id Deleted successfully!"
        ]);
    }
}
