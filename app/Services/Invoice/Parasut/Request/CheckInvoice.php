<?php namespace App\Services\Invoice\Parasut\Request;

use App\Abstracts\InvoiceRequest;
use App\Contracts\CreateCustomerContract;
use App\Contracts\InvoiceServiceContract;
use App\Models\Customer;

class CheckInvoice extends InvoiceRequest
{
    protected $base_uri;
    protected $method = 'post';
    protected $type = 'rest';
    protected $options = [
        'headers' => [
            'content-type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ];

    private $accessToken;
    private $payload;

    private $einvoiceId = '';
    private $einvoiceType = '';
    private string $attribute = '';
    private string $relationShip = '';
    protected mixed $company_id;


    public function __construct(InvoiceServiceContract $customerService, Customer $customer)
    {
        $this->accessToken = $customerService->getAccessToken();
        $this->payload = $this->payload($customer);
        $this->hyperConfig = $customerService->getHyperConfig();
        $this->version = $this->hyperConfig->version;
        $this->company_id = $this->hyperConfig->crediantials['id'];
        $this->path = $this->version."/".$this->company_id."/e_invoice_inboxes";
        $this->options['headers']['Authorization'] = 'Bearer '.$this->accessToken;
        $this->options['body'] = json_encode($this->payload);
        parent::__construct($customerService, $customer);
    }


    public function payload(Customer $customer)
    {
         return [
             'data' => [
               'filter' => $customer->tax_number ?? $customer->identity,
             ],
         ];
    }

    protected function onSuccess(): void
    {
        $content = json_decode($this->getContent());
        $this->setEInvoiceType($content->data->type)
             ->setEInvoiceId($content->data->id)
             ->setRelationShip(json_encode($content->data->relationships))
             ->setAttribute(json_encode($content->data->attributes));
    }


    private function setEInvoiceId(string $einvoiceId)
    {
        $this->einvoiceId = $einvoiceId;
        return $this;
    }

    private function setEInvoiceType(string $einvoiceType)
    {
        $this->einvoiceType = $einvoiceType;
        return $this;
    }

    private function setRelationShip(string $relationShip)
    {
        $this->relationShip = $relationShip;
        return $this;
    }

    private function setAttribute(string $attribute)
    {
        $this->attribute = $attribute;
        return $this;
    }

    public function getEInvoiceId(): string
    {
        return $this->einvoiceId;
    }

    public function getAttribute(): object
    {
        return $this->attribute;
    }
    public function getRelationShip(): object
    {
        return $this->relationShip;
    }
    public function getEInvoiceType(): string
    {
        return $this->einvoiceType;
    }
}