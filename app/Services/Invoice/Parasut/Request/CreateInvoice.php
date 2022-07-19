<?php

namespace App\Services\Invoice\Parasut\Request;


use App\Abstracts\InvoiceRequest;
use App\Contracts\CreateInvoiceContract as CreateInvoiceContract;
use App\Contracts\InvoiceServiceContract;
use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\Invoice;
use Carbon\Carbon;

final class CreateInvoice extends InvoiceRequest implements CreateInvoiceContract
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
    private array $payload;

    private string $invoiceId = '';
    private string $invoiceNo = '';
    private string $invoiceType = '';
    private string $attribute = '';
    private string $relationShip = '';
    protected mixed $company_id;


    public function __construct(InvoiceServiceContract $customerService, CustomerCar $customerCar, Customer $customer)
    {
        $this->accessToken = $customerService->getAccessToken();
        $this->payload = $this->payload($customerCar);
        $this->hyperConfig = $customerService->getHyperConfig();
        $this->version = $this->hyperConfig->version;
        $this->company_id = $this->hyperConfig->crediantials['id'];
        $this->path = $this->version . "/" . $this->company_id . "/sales_invoices";
        $this->options['headers']['Authorization'] = 'Bearer ' . $this->accessToken;
        $this->options['body'] = json_encode($this->payload);
        parent::__construct($customerService, $customerCar);
    }

    public function payload(CustomerCar $customerCar)
    {

        $invoice = array(
            'data' => array(
                'type' => 'sales_invoices', // gerekli
                'attributes' => array(
                    'item_type' => 'invoice', // gerekli
                    'description' => 'Description',
                    'issue_date' => Carbon::now(), // fatura tarih
                    'due_date' => Carbon::now(),
                    'currency' => 'TRL',
                    'order_no' => $customerCar->id,
                    'cash_sale' => TRUE,
                    'payment_account_id' => 912356,
                    'payment_date' => $customerCar->payment->created_at ?? Carbon::now(),
                    "shipment_included" => false,
                    "billing_address" => $customerCar->customer->address,
                    "billing_phone" =>  $customerCar->customer->phone,
                    "tax_office" =>  $customerCar->customer->tax_office,
                    "tax_number" =>  $customerCar->customer->tax_office ?? $customerCar->customer->identity ,
                    "country" =>  "Türkiye",
                    "city" =>  $customerCar->customer->city->name,
                    "district" =>  $customerCar->customer->town->name,
                ),
                'relationships' => array(
                    'details' => array(
                        'data' => array(
                            0 => array(
                                'type' => 'sales_invoice_details',
                                'attributes' => array(
                                    'quantity' => 1,
                                    'unit_price' => '143.2203',
                                    'vat_rate' => 18,
                                    'description' => 'Açıklama'
                                ),
                                "relationships" => array(
                                    "product" => array(
                                        "data" => array(
                                            "id" => 75058689,
                                            "type" => "products"
                                        )
                                    )
                                )
                            )
                        ),
                    ),
                    'contact' => array(
                        'data' => array(
                            'id' => $customerCar->customer->parasut_id,
                            'type' => 'contacts'
                        )
                    )
                ),
            )
        );


        return $invoice;
    }


    protected function onSuccess(): void
    {
        $content = json_decode($this->getContent());
        $this->setInvoiceType($content->data->type)
            ->setInvoiceId($content->data->id)
            ->setInvoiceNo($content->data->attributes->invoice_no)
            ->setRelationShip(json_encode($content->data->relationships))
            ->setAttribute(json_encode($content->data->attributes));
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