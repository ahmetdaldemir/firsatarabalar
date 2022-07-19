<?php namespace App\Services\Invoice\Parasut;

use App\Abstracts\InvoiceService as InvoiceServiceAbstract;
use App\Contracts\CreateCustomerContract;
use App\Contracts\CreateInvoiceContract;
use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\Invoice;
use App\Services\Invoice\Parasut\Request\CheckInvoice;
use App\Services\Invoice\Parasut\Request\CreateCustomer;
use App\Services\Invoice\Parasut\Request\CreateInvoice;
use App\Services\Invoice\Parasut\Request\FinalInvoice;
use App\Services\Invoice\Parasut\Request\GetAccessToken;
use App\Services\Invoice\Parasut\Request\GetInvoice;

class ParasutService extends InvoiceServiceAbstract implements ParasutServiceContract
{
    protected $accessToken;

    public function createInvoice(CustomerCar $customerCar,Customer $customer): CreateInvoiceContract
    {
        $invoiceResult = new CreateInvoice($this, $customerCar,$customer);
        return $invoiceResult;
    }

    public function createCustomer(Customer $customer): CreateCustomerContract
    {
         $customer  = new CreateCustomer($this,$customer);
        return $customer;
    }

    public function getInvoice(string $invoiceNumber)
    {
        $invoice  = new GetInvoice($this,$invoiceNumber);
        return $invoice;
    }

    public function checkInvoice(Customer $customer)
    {
        $invoice  = new CheckInvoice($this,$customer);
        return $invoice;
    }

    public function finalInvoice($type,$invoiceId)
    {
        $invoice  = new FinalInvoice($this,$type,$invoiceId);
        return $invoice;
    }



    public function getAccessToken(): ?string
    {
        if ($this->accessToken == null) {
            $tokenRequest = new GetAccessToken($this);
            if ($tokenRequest->hasErrors()) {
                $this->addError('Access token request failed', $tokenRequest->getErrors());

                return null;
            }
            $this->accessToken = $tokenRequest->getAccessToken();

            return $this->accessToken;
        }

        return $this->accessToken;
    }


}