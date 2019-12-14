<?php

namespace App\Http\Controllers;

use App\Document;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        return response()->json('ddfgf');
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'title' => 'required'
        ]);
        
        // $name = \Str::slug($request->title).'-'.Carbon::now()->format('dmYhis').'.'.$request->file('file')->getClientOriginalExtension();
        // $img = $request->file('file')->storeAs('images', $name, 'public_uploads_v2');
        $img = $request->file('file')->store('zzzz');

        return response()->json($img);   
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        //
    }
}
