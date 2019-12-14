<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $item = $request->hasFile('image') ? 'ada' : 'tidak ada';
        return response()->json($item);   
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
