<?php

namespace App\Http\Controllers;

use App\Article;
use App\Document;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
    }
    public function welcome()
    {
        return view('welcome')->with([
            'articles'  => Article::whereIn('category', ['kegiatan', 'blog'])->orderBy('updated_at', 'desc')->get(),
            'photos'    => Document::where('category', 'kegiatan')->get(),
            'slider'    => Document::where('category', 'slider')->get(),
            'news'       => Article::whereIn('category', ['pengumuman'])->orderBy('updated_at', 'desc')->paginate(5),
            'documents'  => Document::whereIn('category', ['Postingan', 'Dokumen'])->orderBy('updated_at', 'desc')->paginate(5),    
        ]);
    }

    public function artikel_index()
    {
        return view('articles')->with([
            'articles'  => Article::whereIn('category', ['kegiatan', 'blog'])->orderBy('updated_at', 'desc')->get(),
            'news'       => Article::whereIn('category', ['pengumuman'])->orderBy('updated_at', 'desc')->paginate(5),
            'documents'  => Document::whereIn('category', ['Postingan', 'Dokumen'])->orderBy('updated_at', 'desc')->paginate(5),    
        ]);
    }

    public function artikel_show($slug)
    {
        return view('article')->with([
            'item'      => \App\Article::where('slug', $slug)->first(),
            'news'       => Article::whereIn('category', ['pengumuman'])->orderBy('updated_at', 'desc')->paginate(5),
            'documents'  => Document::whereIn('category', ['Postingan', 'Dokumen'])->orderBy('updated_at', 'desc')->paginate(5),    
        ]);
    }

    public function artikel_blog($slug)
    {
        $item = \App\Article::where('slug', $slug)->first();
        return view('article')->with([
            'item'      => $item,
            'news'       => Article::whereIn('category', ['pengumuman'])->orderBy('updated_at', 'desc')->paginate(5),
            'documents'  => Document::whereIn('category', ['Postingan', 'Dokumen'])->orderBy('updated_at', 'desc')->paginate(5),    
        ]);
    }
}
