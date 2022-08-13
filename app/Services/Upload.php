<?php

namespace App\Services;

 use Illuminate\Http\Request;
 use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Upload
{

    protected $filename;

    public function __construct()
    {
        $this->filename = "";
    }

    public function index($file)
    {

        $uploadedFile = $file->getClientOriginalName();
        $filename = time() ."_". $uploadedFile;
        Storage::disk('local')->putFileAs(
            'public/files/',
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