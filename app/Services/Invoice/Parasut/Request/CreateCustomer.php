<?php namespace App\Services\Invoice\Parasut\Request;

use App\Abstracts\InvoiceRequest;
use App\Contracts\CreateCustomerContract;
use App\Contracts\InvoiceServiceContract;
use App\Models\Customer;

class CreateCustomer extends InvoiceRequest implements CreateCustomerContract
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

    private $customerId = '';
    private $customerType = '';
    private $attribute = '';
    private $relationShip = '';
    protected $company_id;



    public function __construct(InvoiceServiceContract $customerService, Customer $customer)
    {
        $this->accessToken = $customerService->getAccessToken();
        $this->payload = $this->payload($customer);
        $this->hyperConfig = $customerService->getHyperConfig();
        $this->version = $this->hyperConfig->version;
        $this->company_id = $this->hyperConfig->crediantials['id'];
        $this->path = $this->version."/".$this->company_id."/contacts";
        $this->options['headers']['Authorization'] = 'Bearer '.$this->accessToken;
        $this->options['body'] = json_encode($this->payload);
        parent::__construct($customerService, $customer);
    }


    public function payload(Customer $customer)
    {
         return [
             'data' => [
               'id' => $this->company_id,
               'type' => 'contacts',
               'attributes' => [
                          'email' =>  $customer->email,
                          'name' =>   $customer->firstname." ".$customer->lastname,
                          'contact_type' =>  "person",
                          'tax_office' =>  $customer->tax_office,
                          'tax_number' =>   $customer->tax_number,
                          'district' =>    $customer->town->name,
                          'city' =>   $customer->city->name,
                          'country' =>  "Türkiye",
                          'address' =>   $customer->address,
                          'phone' =>   $customer->phone,
                          'account_type' =>   "customer",
                ],
             ],
         ];
    }

    protected function onSuccess(): void
    {
        $content = json_decode($this->getContent());
        $this->setCustomerType($content->data->type)
            ->setCustomerId($content->data->id)
            ->setRelationShip(json_encode($content->data->relationships))
            ->setAttribute(json_encode($content->data->attributes));
    }


    private function setCustomerId(string $customerId): CreateCustomer
    {
        $this->customerId = $customerId;
        return $this;
    }

    private function setCustomerType(string $customerType): CreateCustomer
    {
        $this->customerType = $customerType;
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

    public function getCustomerId(): string
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
    public function getCustomerType(): string
    {
        return $this->customerType;
    }
}