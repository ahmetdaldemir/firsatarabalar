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
            'public/cars/',
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

    public function mobil($request)
    {
        $path = $request->file('image')->store('images');

        $imageName = "yeni_".time().'.'.$request->extension();
        $request->move(public_path('images'),$imageName);
        return $imageName;
    }

}