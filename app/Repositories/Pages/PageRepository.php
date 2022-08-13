<?php namespace App\Repositories\Pages;


use App\Models\Page;
use App\Services\Upload;
use Illuminate\Support\Str;

class PageRepository implements PageRepositoryInterface
{

    protected $upload;

    public function __construct()
    {
        $this->upload = new Upload();

    }
    public function get()
    {
        return Page::all();
    }

    public function getById($id)
    {
        return Page::findOrFail($id);
    }

    public function delete($id)
    {
        return Page::destroy($id);
    }

    public function create($request)
    {
        $filename = "";
        if (!empty($request->files->all())) {
            $files = $request->files->all()['file'];
            $this->upload->index($files);
            $filename = $this->upload->getFileName();
        }

        $Page = new Page();
        $Page->id_parent = 0;
        $Page->categories =$request->categories;
        $Page->type =$request->type;
        $Page->title =$request->title;
        $Page->content =$request->content;
        $Page->images = $filename;
        $Page->slug = Str::slug($request->title);
       // $Page->meta_key =$request->meta_key;
        // $Page->meta_description =$request->meta_description;
        // $Page->labels =$request->labels;
        $Page->status =1;
        $Page->save();
    }

    public function update($id, $request)
    {


        $filename = "";
        if (!empty($request->files->all())) {
            $files = $request->files->all()['file'];
            $this->upload->index($files);
            $filename = $this->upload->getFileName();
        }


        $Page = Page::find($id);
        $Page->categories =$request->categories;
        $Page->type =$request->type;
        $Page->title =$request->title;
        $Page->content =$request->content;
        $Page->images =$filename;
        $Page->slug = Str::slug($request->title);
       // $Page->meta_key =$request->meta_key;
        //  $Page->meta_description =$request->meta_description;
        // $Page->labels =$request->labels;
        if (empty($request->status)) {
            $Page->status = 0;
        }else{
            $Page->status = 1;
        }
        $Page->save();
    }

    public function filter()
    {
        // TODO: Implement filter() method.
    }


}