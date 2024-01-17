<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Http\Resources\ReviewCollection;
use App\Http\Resources\ReviewResource;
use App\Filters\ReviewFilter;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filter = new ReviewFilter();
        $queryItems = $filter->transform($request);
        $includeUsers = $request->query('includeUsers');
        $reviews = Review::where($queryItems);
        if ($includeUsers) {
             $reviews = $reviews->with('users');
        }
        return new ReviewCollection($reviews->paginate()->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {
        //
        return new ReviewResource(Review::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
         //
         return new ReviewResource($review);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
        $review->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $review = Review::find($id);
        if(is_null($review)){
            return response()->json('Data not found', 404);
        }
        $review->delete();
        return response()->json(['Review deleted successfully.']);
    }
}
