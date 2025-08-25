<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{
    public function getAll()
    {
        return Customer::all();
    }

    public function getById($id)
    {
        return Customer::findOrFail($id);
    }

    public function create(array $customer)
    {
        return Customer::create($customer);
    }

    public function update($id, array $data)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($data);
        return $customer;
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        return $customer->delete();
    }
}
