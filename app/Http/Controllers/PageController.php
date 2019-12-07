<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        $article = \App\Article::paginate(6);
        return view('welcome')->with([
            'articles' => $article,
        ]);
    }

    public function artikel_index()
    {
        return view('user.artikel.index')->with([
            'articles' => \App\Article::paginate(6)
        ]);
    }

    public function artikel_show($id)
    {
        return view('user.artikel.show')->with([
            'item' => \App\Article::find($id)
        ]);
    }

    public function kontak()
    {
        return view('kontak');
    }
}
