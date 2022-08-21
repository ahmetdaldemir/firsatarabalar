<?php namespace App\Errors;


use App\Contracts\CreateInvoiceContract;
use App\Models\RemoteApiLog;
use App\Traits\HasErrors;

class CreateInvoiceContractError implements CreateInvoiceContract
{
    use HasErrors;

    public function __construct(array $errors, ?RemoteApiLog $log = null)
    {
        $this->addErrors($errors);
        $this->log = $log;
    }

    public function getShipmentId(): string
    {
        return '';
    }

    public function getTrackingCode(): string
    {
        return '';
    }

    public function getPieces(): array
    {
        return [];
    }

    public function getLabelId(): string
    {
        return '';
    }

    function getStatusCode()
    {

    }

    function getContent()
    {

    }

    function getLog(): ?RemoteApiLog
    {
        return $this->log;
    }

    public function getInvoiceId(): string
    {
        // TODO: Implement getInvoiceId() method.
    }

    public function getInvoiceNo(): string
    {
        // TODO: Implement getInvoiceNo() method.
    }

    public function getInvoiceType(): string
    {
        // TODO: Implement getInvoiceType() method.
    }

    public function getRelationShip(): object
    {
        // TODO: Implement getRelationShip() method.
    }

    public function getAttribute(): object
    {
        // TODO: Implement getAttribute() method.
    }
}