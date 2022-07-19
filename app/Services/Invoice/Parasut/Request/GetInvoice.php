<?php

namespace App\Services\Invoice\Parasut\Request;


use App\Abstracts\InvoiceRequest;
use App\Contracts\CreateInvoiceContract as CreateInvoiceContract;
use App\Contracts\InvoiceServiceContract;
use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\Invoice;
use Carbon\Carbon;

final class GetInvoice extends InvoiceRequest implements CreateInvoiceContract
{

    protected $base_uri;
    protected $method = 'get';
    protected $type = 'rest';
    protected $options = [
        'headers' => [
            'content-type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ];

    private $accessToken;
    private array $payload;

    private string $invoiceId = '';
    private string $invoiceNo = '';
    private string $invoiceType = '';
    private string $attribute = '';
    private string $relationShip = '';
    protected mixed $company_id;


    public function __construct(InvoiceServiceContract $customerService, $invoice_id)
    {
        $this->accessToken = $customerService->getAccessToken();
         $this->hyperConfig = $customerService->getHyperConfig();
        $this->version = $this->hyperConfig->version;
        $this->company_id = $this->hyperConfig->crediantials['id'];
        $this->path = $this->version . "/" . $this->company_id . "/sales_invoices/".$invoice_id;
        $this->options['headers']['Authorization'] = 'Bearer ' . $this->accessToken;
        $this->options['body'] = "";
        parent::__construct($customerService, $invoice_id);
    }


    protected function onSuccess(): void
    {
        $content = json_decode($this->getContent());
        dd($content);
       // $this->setInvoiceType($content->data->type)
        //     ->setInvoiceId($content->data->id)
        //   ->setInvoiceNo($content->data->attributes->invoice_no)
        //   ->setRelationShip(json_encode($content->data->relationships))
        //   ->setAttribute(json_encode($content->data->attributes));
    }

    private function setInvoiceNo(string $invoiceNo): CreateInvoice
    {
        $this->invoiceNo = $invoiceNo;
        return $this;
    }

    private function setInvoiceId(string $invoiceId): CreateInvoice
    {
        $this->invoiceId = $invoiceId;
        return $this;
    }

    private function setInvoiceType(string $invoiceType): CreateInvoice
    {
        $this->invoiceType = $invoiceType;
        return $this;
    }

    private function setRelationShip(string $relationShip): CreateInvoice
    {
        $this->relationShip = $relationShip;
        return $this;
    }

    private function setAttribute(string $attribute): CreateInvoice
    {
        $this->attribute = $attribute;
        return $this;
    }

    public function getInvoiceId(): string
    {
        return $this->invoiceId;
    }

    public function getInvoiceNo(): string
    {
        return $this->invoiceNo;
    }

    public function getAttribute(): object
    {
        return $this->attribute;
    }

    public function getRelationShip(): object
    {
        return $this->relationShip;
    }

    public function getInvoiceType(): string
    {
        return $this->invoiceType;
    }
}