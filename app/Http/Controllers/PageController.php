<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        return view('welcome')->with(['items' => \App\Article::orderBy('created_at', 'desc')->get()]);
    }

    public function artikel_index()
    {
        return view('user.artikel.index')->with([
            'items' => \App\Article::paginate()
        ]);
    }

    public function artikel_show($id)
    {
        return view('user.artikel.show')->with([
            'item' => \App\Article::find($id)
        ]);
    }
}
