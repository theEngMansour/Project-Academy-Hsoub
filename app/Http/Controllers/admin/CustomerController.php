<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Customer;

class CustomerController extends Controller
{
    protected $customers;

    public function __construct(Customer $customers)
    {
        $this->customers = $customers;
    }

    public function getByCustomer()
    {
        return view('company');
    }
}
