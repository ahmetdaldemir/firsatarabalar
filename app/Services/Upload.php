<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Upload
{

    protected $filename;

    public function __construct()
    {
        $this->filename = "";
    }

    public function index(UploadedFile $file)
    {
        $uploadedFile = $file->getClientOriginalName();
        $filename = time() . $uploadedFile->getClientOriginalName();
        Storage::disk('local')->putFileAs(
            'files/' . $filename,
            $file,
            $filename
        );
        $this->setFileName($filename);
    }

    public function setFileName($filename)
    {
        $this->filename = $filename;
    }

    public function getFileName(): string
    {
        return $this->filename;
    }

}