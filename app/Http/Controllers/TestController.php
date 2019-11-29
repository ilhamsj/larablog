<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function upload(Request $request)
    {
        // $path = $request->file('file')->store('public');
        // return response()->json(secure_url('storage/'.Str::after($path, 'public')));

        if($request->hasFile('file')) {
            $request->file('file')->storeAs('', $request->file('file')->getClientOriginalName(), 'public_uploads');
            return response()->json(env('app_url').'images/'.$request->file('file')->getClientOriginalName());
        }
    }
}