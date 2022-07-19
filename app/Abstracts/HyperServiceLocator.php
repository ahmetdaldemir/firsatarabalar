<?php namespace App\Abstracts;

class HyperServiceLocator
{
    protected $companyName;
    protected $env;
    public function __construct($companyName,$env)
    {
        $this->companyName = $companyName;
        $this->env = $env;
    }

    public function getInvoiceService()
    {
        $this->content_type = config("hyperrepo.{$this->companyName}.env.{$this->env}.content_type");
        $this->version = config("hyperrepo.{$this->companyName}.env.{$this->env}.api_version");
        $this->base_uri = config("hyperrepo.{$this->companyName}.env.{$this->env}.path");
        $this->crediantials = config("hyperrepo.{$this->companyName}.env.{$this->env}.crediantials");
        return $this;
    }
}