<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('file')) {
            $request->file('file')->storeAs('', $request->file('file')->getClientOriginalName(), 'public_uploads');
            return response()->json(env('APP_URL').'images/'.$request->file('file')->getClientOriginalName());
        }
    }

    public function file_index()
    {
        $items = array_diff(scandir(public_path().'\images'), array('.', '..'));
        return datatables($items)
            ->addColumn('image', function ($items) {
                return '<img class="img-fluid" src="'.secure_url('images/'.$items).'"/>';
            })
            ->rawColumns(['image'])
            ->toJson();
    }

}