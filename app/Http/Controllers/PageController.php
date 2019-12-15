<?php

namespace App\Http\Controllers;

use App\Article;
use App\Document;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        return view('welcome')->with([
            'articles'  => Article::whereIn('category', ['kegiatan', 'blog'])->orderBy('updated_at', 'desc')->get(),
            'news'      => Article::whereIn('category', ['pengumuman'])->orderBy('updated_at', 'desc')->get(),
            'documents' => Document::whereIn('category', ['Postingan', 'Dokumen'])->orderBy('updated_at', 'desc')->get(),
            'photos'    => Document::where('category', 'kegiatan')->get(),
            'slider'    => Document::where('category', 'slider')->get(),
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
