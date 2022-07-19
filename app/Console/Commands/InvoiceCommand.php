<?php namespace App\Console\Commands;

use App\Abstracts\HyperServiceLocator;
use App\Models\Customer;
use App\Models\CustomerCar;
use App\Models\CustomerCarPaymentTransaction;
use App\Models\CustomerInvoice;
use App\Services\Invoice\Parasut\ParasutService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class InvoiceCommand extends Command
{

    protected $invoiceServiceLocator;
    protected $environment;
    protected $type;

    public function __construct()
    {
        parent::__construct();
        $this->environment = config('hyperrepo.active_env');
        $parasutInvoiceSetting = new HyperServiceLocator("parasut",$this->environment);
        $this->invoiceServiceLocator = $parasutInvoiceSetting->getInvoiceService();
        $this->type = 'e_archives';
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:invoice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //->where('status',1)->where('created_at', '<=', Carbon::now()->subDays(5)->toDateTimeString())
       $customer_car_payment_transaction = CustomerCarPaymentTransaction::where('invoice',0)->get()->take(1);
       foreach ($customer_car_payment_transaction as $item)
       {
           $customer_car = CustomerCar::find($item->customer_car_id);

           $customerinvoice = new CustomerInvoice();
           $customerinvoice->customer_id = $customer_car->customer_id;
           $customerinvoice->customer_car_payment_transaction_id = $item->id;
           $customerinvoice->status = 0;
           $customerinvoice->save();

           $this->invoiceProcess($customer_car,$customer_car->customer,$customerinvoice);
          // if($customer_car->status == 6)
           // {
           //   $this->invoiceProcess($customer_car,$customer_car->customer);
           // }
       }
    }

    public function invoiceProcess(CustomerCar $customerCar,Customer $customer,CustomerInvoice $customerInvoice)
    {
        $invoiceService = new ParasutService();
        if($customer->parasut_id == NULL)
        {
            $invoiceCustomer = $invoiceService->createCustomer($customer);
            $customer_id = $invoiceCustomer->getCustomerId();
            $customer->parasut_id = $customer_id;
            $customer->save();
        }
        $createInvoice =   $invoiceService->createInvoice($customerCar,$customer);
        $customerCar->payment->invoice = 1;
        $customerCar->payment->invoice_id = $createInvoice->getInvoiceId();
        $customerCar->payment->invoice_number = $createInvoice->getInvoiceNo();
        $customerCar->payment->save();
        $invoiceID = $invoiceService->getInvoice($createInvoice->getInvoiceId());
        $checkInvoice = $invoiceService->checkInvoice($customer);

        if(!is_null($createInvoice))
        {
            $EInvoiceId = $checkInvoice->getEInvoiceId();
            $this->type = "e_invoices";
            $invoiceService->finalInvoice($this->type,$createInvoice->getInvoiceId());
        }else{
            $invoiceService->finalInvoice($this->type,$createInvoice->getInvoiceId());
        }


        $customerCar->EInvoiceId = $EInvoiceId;
        $customerCar->invoiceId = $invoiceID;
        $customerCar->type = $this->type;
        $customerCar->save();
    }
}
