<?php

namespace App\Jobs;

use App\Models\CustomerCar;
use PDF;
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
        $payload = [
            'data' => $this->customercar->valuation(),
            'customercar' => $this->customercar,
        ];


        \File::delete(storage_path()."/pdf/".$this->customercar->id.'.pdf');

        $pdf = PDF::setPaper('a4', 'portrait')->setOptions(['dpi' => 120, 'defaultFont' => 'sans-serif'])->loadView('pdf/customer_car_valuation_pdf', $payload);
        return $pdf->save(storage_path()."/pdf/".$this->customercar->id.'.pdf');
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
