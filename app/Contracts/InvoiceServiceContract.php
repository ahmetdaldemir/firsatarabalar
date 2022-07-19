<?php

namespace App\Contracts;

use App\Abstracts\HyperServiceLocator;
use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\Invoice;
use DateTime;

interface InvoiceServiceContract
{
    public function getHyperConfig(): HyperServiceLocator;
    public function createInvoice(CustomerCar $customerCar,Customer $customer): CreateInvoiceContract;
    public function createCustomer(Customer $customer): CreateCustomerContract;
 }