<?php namespace App\Services\Invoice\Parasut;


use App\Contracts\InvoiceServiceContract;

interface ParasutServiceContract extends InvoiceServiceContract
{
    public function getAccessToken(): ?string;
}