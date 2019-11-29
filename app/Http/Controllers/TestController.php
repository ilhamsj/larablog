<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // $items = array_diff(scandir(public_path().'\images'), array('.', '..'));
        // return datatables($items)
        //     ->addIndexColumn()
        //     ->addColumn('image', function ($items) {
        //         return '<img class="img-fluid" src="'.secure_url('images/'.$items).'"/>';
        //     })
        //     ->rawColumns(['image'])
        //     ->toJson();

        $items = scandir(\public_path('images'));
        return response()->json([
            'data' => $items
        ]);
    }

}