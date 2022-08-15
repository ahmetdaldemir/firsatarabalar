<?php

namespace App\Repositories\Reviews;

use App\Models\Review;

class ReviewRepository implements ReviewRepositoryInterface
{

    public function get()
    {
        return Review::orderBy('id','desc')->get();
    }

    public function getById($id)
    {
        return Review::find($id);
    }

    public function delete($id)
    {
        return Review::where('id',$id)->delete();
    }

    public function status($request)
    {
        $review = Review::where('id',$request->id)->first();
        $review->status = $request->status;
        $review->save();
    }

    public function create($request)
    {
        // TODO: Implement create() method.
    }

    public function update($id, $request)
    {
        // TODO: Implement update() method.
    }

    public function filter()
    {
        // TODO: Implement filter() method.
    }
}