<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $items = Review::all();
        return datatables($items)
            ->toJson();
    }

    public function store(Request $request)
    {
        $item = Review::create($request->all());

        return response()->json([
            'data' => $item,
            'status' => 'Review Success',
        ]);
    }
}
