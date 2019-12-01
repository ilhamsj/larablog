<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TestController extends Controller
{
    public function file_upload(Request $request)
    {
        if($request->hasFile('file')) {
            $request->file('file')->storeAs('', $request->file('file')->getClientOriginalName(), 'public_uploads');
            return response()->json(env('APP_URL').'images/'.$request->file('file')->getClientOriginalName());
        }
    }

    public function file_index()
    {
        $items = scandir(\public_path('images'));
        $items = array_diff($items, ['.', '..']);
        return response()->json($items);
    }

    public function file_destroy($id)
    {
        $x = \file_exists(\public_path('images/'.$id));
        unlink(\public_path('images/'.$id));
        return response()->json($id . ' ' . $x);
    }

}