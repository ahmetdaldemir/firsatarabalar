<?php namespace App\Repositories\Pages;


use App\Models\Page;

class PageRepository implements PageRepositoryInterface
{

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
        $Page = new Page();
        $Page->firstname = $request->firstname;
        $Page->lastname = $request->lastname;
        $Page->email = $request->email;
        $Page->phone = $request->phone;
        $Page->password = bcrypt($request->password);
        $Page->earn = 0;
        $Page->save();
    }

    public function update($id, $request)
    {
        $Page = Page::find($id);
        $Page->firstname = $request->firstname;
        $Page->lastname = $request->lastname;
        $Page->email = $request->email;
        $Page->phone = $request->phone;
        if ($request->password) {
            $Page->password = bcrypt($request->password);
        }
        $Page->earn = $request->earn;
        if (empty($request->status)) {
            $Page->status = 0;
        }else{
            $Page->status = $request->status;
        }
        $Page->save();
    }

    public function filter()
    {
        // TODO: Implement filter() method.
    }


}