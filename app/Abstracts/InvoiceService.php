<?php namespace App\Abstracts;

use App\Contracts\CreateInvoiceContract;
use App\Contracts\InvoiceServiceContract;
use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\Invoice;
use App\Traits\HasErrors;
use DateTime;

abstract class InvoiceService implements InvoiceServiceContract
{
    use HasErrors;

    protected $invoiceServiceLocator;

    public function __construct()
    {
        $this->environment = config('hyperrepo.active_env');
        $parasutInvoiceSetting = new HyperServiceLocator("parasut",$this->environment);
        $this->invoiceServiceLocator = $parasutInvoiceSetting->getInvoiceService();
    }

    public function getHyperConfig(): HyperServiceLocator
    {
        return $this->invoiceServiceLocator;
    }

    abstract public function createInvoice(CustomerCar $customerCar,Customer $customer): CreateInvoiceContract;


}