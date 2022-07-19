<?php namespace App\Contracts;


interface FinalInvoiceContract extends HyperRequest
{
    public function getInvoiceId(): string;
    public function getInvoiceType(): string;
    public function getRelationShip(): object;
    public function getAttribute(): object;
}