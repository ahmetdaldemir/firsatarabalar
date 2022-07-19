<?php namespace App\Contracts;


interface CreateCustomerContract extends HyperRequest
{
    public function getCustomerId(): string;
    public function getCustomerType(): string;
    public function getRelationShip(): object;
    public function getAttribute(): object;
}