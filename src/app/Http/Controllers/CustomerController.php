<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use Illuminate\Routing\Controller;

class CustomerController extends Controller
{
    protected CustomerService $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        return response()->json($this->customerService->getAll());
    }

    public function show($id)
    {
        return response()->json($this->customerService->getById($id));
    }

    public function store(Request $request)
    {
        $customer = $this->customerService->create($request->all());
        return response()->json($customer, 201);
    }

    public function update(Request $request, $id)
    {
        $customer = $this->customerService->update($id, $request->all());
        return response()->json($customer);
    }

    public function destroy($id)
    {
        $this->customerService->delete($id);
        return response()->json(null, 204);
    }
}
