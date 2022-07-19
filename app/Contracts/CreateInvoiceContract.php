<?php namespace App\Contracts;


interface CreateInvoiceContract extends HyperRequest
{
    public function getInvoiceId(): string;
    public function getInvoiceNo(): string;
    public function getInvoiceType(): string;
    public function getRelationShip(): object;
    public function getAttribute(): object;
}