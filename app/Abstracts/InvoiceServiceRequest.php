<?php namespace App\Abstracts;

use App\Abstracts\HyperRequest;
use App\Contracts\InvoiceServiceContract;

abstract class InvoiceServiceRequest extends HyperRequest
{

    protected $invoiceService;

    protected $userConfig;

    public function __construct(InvoiceServiceContract $invoiceService)
    {
        $this->invoiceService = $invoiceService;
        $invoiceService->getHyperConfig();
        $environment = config('hyperrepo.active_env');
        $shippingServiceCode = $invoiceService->getHyperConfig();
        $this->base_uri = config("hyperrepo.parasut.env.{$environment}.path");
        $this->userConfig = $invoiceService->getHyperConfig();
        parent::__construct();
    }

    public function onComplete(): void
    {
        $this->invoiceService->addErrors(
            $this->getErrors() ?? []
        );
    }
}
