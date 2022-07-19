<?php namespace App\Services\Invoice\Parasut\Request;

use App\Abstracts\InvoiceRequest;
use App\Contracts\FinalInvoiceContract;
use App\Contracts\InvoiceServiceContract;
use App\Models\Customer;
use Carbon\Carbon;

class FinalInvoice extends InvoiceRequest implements FinalInvoiceContract
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

    private $invoiceId = '';
    private $invoiceType = '';
    private $attribute = '';
    private $relationShip = '';
    protected $company_id;


    public function __construct(InvoiceServiceContract $customerService, $type, $invoiceId)
    {
        $this->accessToken = $customerService->getAccessToken();
        $this->payload = $this->{$type}($type, $invoiceId);
        $this->hyperConfig = $customerService->getHyperConfig();
        $this->version = $this->hyperConfig->version;
        $this->company_id = $this->hyperConfig->crediantials['id'];
        $this->path = $this->version . "/" . $this->company_id . "/" . $type;
        $this->options['headers']['Authorization'] = 'Bearer ' . $this->accessToken;
        $this->options['body'] = json_encode($this->payload);
        parent::__construct($customerService, $this->payload);
    }


    public function e_invoices($type, $invoiceId)
    {
        return [
            'data' => [
                'id' => "",
                'type' => $type,
                'relationships' => [
                    'invoice' => [
                        'data' => [
                            'id' => $invoiceId,
                            'type' => "sales_invoices",
                        ]
                    ]
                ]
            ],
        ];
    }

    public function e_archives($type, $invoiceId)
    {
        return [
            'data' => [
                'id' => "",
                'type' => $type,
                'attributes' => [
                    'url' => "https://firsatarabalar.com",
                    'payment_type' => "KREDIKARTI/BANKAKARTI",
                    'payment_platform' => "iyzico",
                    'payment_date' => Carbon::now(),

                ],
                'relationships' => [
                    'sales_invoice' =>
                        [
                            'data' => [
                                'id' => $invoiceId,
                                'type' => "sales_invoices",
                            ]
                        ]

                ]
            ],
        ];
    }

    protected function onSuccess(): void
    {
        $content = json_decode($this->getContent());
        $this->setInvoiceType($content->data->type)
            ->setInvoiceId($content->data->id)
            ->setRelationShip(json_encode($content->data->relationships))
            ->setAttribute(json_encode($content->data->attributes));
    }


    private function setInvoiceId(string $invoiceId): CreateCustomer
    {
        $this->invoiceId = $invoiceId;
        return $this;
    }

    private function setInvoiceType(string $invoiceType): CreateCustomer
    {
        $this->invoiceType = $invoiceType;
        return $this;
    }

    private function setRelationShip(string $relationShip): CreateCustomer
    {
        $this->relationShip = $relationShip;
        return $this;
    }

    private function setAttribute(string $attribute): CreateCustomer
    {
        $this->attribute = $attribute;
        return $this;
    }

    public function getInvoiceId(): string
    {
        return $this->customerId;
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
        return $this->customerType;
    }
}