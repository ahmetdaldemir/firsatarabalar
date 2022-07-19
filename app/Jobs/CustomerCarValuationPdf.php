<?php

namespace App\Jobs;

use App\Models\CustomerCar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
class CustomerCarValuationPdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private const CACHE_TTL = 31556926;
    public $tries = 1;
    public $customercar;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(CustomerCar $customerCar)
    {
        $this->customercar = $customerCar;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $payload = [
            'data' => $this->customercar->valuation(),
            'customercar' => $this->customercar,
        ];

        $batchId = $this->batch()->id;
        $pdf = PDF::loadView('pdf/customer_car_valuation_pdf', [ 'payload' => $payload ])->setPaper('legal', 'portrait');
        $fileName =  sprintf('%s %s %s.pdf',
            "Deneme"
        );

        $pdfFilePath = '/results/' . $batchId . '/' . $fileName;
        Storage::disk('local')->put($pdfFilePath, $pdf->output());

        $this->updateZipArchive($batchId, $pdfFilePath, $fileName);
    }

    private function updateZipArchive($batchId, $pdfFilePath, $fileName)
    {
        $zip = new ZipArchive();
        $zipFilePath = Storage::disk('local')->path('/results/' . $this->batchId . '/' . $this->batchId . '.zip');
        $pdfLocalFilePath = Storage::disk('local')->path($pdfFilePath);

        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            $zip->addFromString($fileName, Storage::disk('local')->get($pdfFilePath));
            $zip->close();
        } else {
            logger('Failed opening zip file:' . $zipFilePath);
        }
    }
}
