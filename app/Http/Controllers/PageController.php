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
            'photos' => \App\Document::where('category', 'kegiatan')->get(),
            'slider' => \App\Document::where('category', 'slider')->get(),
        ]);
    }

    public function artikel_index()
    {
        return view('articles')->with([
            'articles' => \App\Article::paginate(6)
        ]);
    }

    public function artikel_show($id)
    {
        return view('article')->with([
            'item' => \App\Article::find($id),
            'articles' => \App\Article::paginate(6)
        ]);
    }

    public function kontak()
    {
        // return view('kontak');
    }
}
