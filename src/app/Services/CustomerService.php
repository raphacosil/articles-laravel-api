<?php

namespace App\Services;

use App\Models\Customer;
use App\Repositories\CustomerRepository;

class CustomerService
{
    protected CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $repository)
    {
        $this->customerRepository = $repository;
    }

    public function getAll()
    {
        return $this->customerRepository->getAll();
    }

    public function getById($id)
    {
        return $this->customerRepository->getById($id);
    }

    public function create(Customer $customer)
    {
        if (
            empty($customer['name'] ||
            empty($customer['email']) ||
            empty($customer['password']) ||
            empty($customer['role'])
        )) {
            throw new \InvalidArgumentException("Missing content");
        };
        return $this->customerRepository->create($customer);
    }

    public function update($id, Customer $customer)
    {
        return $this->customerRepository->update($id, $customer);
    }

    public function delete($id)
    {
        return $this->customerRepository->delete($id);
    }
}
