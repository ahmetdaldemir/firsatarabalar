<?php namespace App\Abstracts;



 use App\Contracts\InvoiceServiceContract;
 use App\Models\Invoice;
 use App\Models\RemoteApiLog;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Str;
use ReflectionClass;

abstract class InvoiceRequest extends InvoiceServiceRequest
{

    protected $parameter;

    public function __construct(InvoiceServiceContract $invoiceService,$parameter)
    {
        $this->paramater = $parameter;
        parent::__construct($invoiceService);
    }

    public function __destruct()
    {
        if ($this->hasErrors()) {
            $jo = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT;
            $sc = $this->invoiceService->getHyperConfig();
            $errors = Str::limit(json_encode($this->getErrors(), $jo), 1000, "\n...");
            $response = json_encode($this->getContent(), $jo);
            $message = "Error";
        }
    }

    public function onComplete(): void
    {
        parent::onComplete();
        if ($this->getLog()) {
            $logPivot = new RemoteApiLog();
            $logPivot->user_id = Auth::id() == 0;
            $logPivot->model_id = $this->paramater->id;
            $logPivot->type = (new ReflectionClass($this))->getShortName();
            $logPivot->save();
        }
    }
}