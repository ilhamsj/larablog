<?php

namespace App\Http\Controllers;

use App\Review;
use App\ArticleComment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReviewController extends Controller
{
    public function index()
    {
        $items = Review::where('category', 'Review');
        return datatables($items)
            ->toJson();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required',
            'content'       => 'required',
            'category'      => 'required',
            'article_id'    => Rule::requiredIf($request->category == 'Komentar'),
        ]);

        $item = Review::create($request->all());

        if ($request->category == 'Komentar'):
            $comment = ArticleComment::create([
                'article_id'    => $request->article_id,
                'review_id'     => $item->id,
            ]);
        endif;

        return response()->json([
            'status' => $request->category . ' Success'
        ]);
    }
}
