<?php

namespace App\Http\Controllers;

use App\Article;
use App\Document;

class PageController extends Controller
{
    protected $articles;
    protected $news;
    protected $documents;

    public function __construct()
    {
        $this->articles     = Article::whereIn('category', ['kegiatan', 'blog'])->orderBy('updated_at', 'desc')->get();
        $this->news         = Article::whereIn('category', ['pengumuman'])->orderBy('updated_at', 'desc')->paginate(5);
        $this->documents    = Document::whereIn('category', ['Postingan', 'Dokumen'])->orderBy('updated_at', 'desc')->paginate(5);
    }

    public function welcome()
    {
        return view('welcome')->with([
            'photos'    => Document::where('category', 'kegiatan')->get(),
            'slider'    => Document::where('category', 'slider')->get(),
            'articles'  => $this->articles,
            'news'      => $this->news,
            'documents' => $this->documents,
        ]);
    }

    public function artikel_index()
    {
        return view('articles')->with([
            'articles'  => $this->articles,
            'news'      => $this->news,
            'documents' => $this->documents,
        ]);
    }

    public function artikel_show($slug)
    {
        $item = Article::where('slug', $slug);

        if ($item->count() > 0) :
            return view('article')->with([
                'item'      => $item->first(),
                'news'      => $this->news,
                'documents' => $this->documents,
            ]);
        else :
            return view('404');
        endif;
    }

    public function artikel_blog($slug)
    {
        return view('article')->with([
            'item'      => Article::where('slug', $slug)->first(),
            'news'      => $this->news,
            'documents' => $this->documents,
        ]);
    }

    public function artikel_pengumuman()
    {
        return view('articles')->with([
            'articles'  => $this->news,
            'news'      => $this->news,
            'documents' => $this->documents,
        ]);
    }

    public function dokumen_index()
    {
        return view('documents')->with([
            'articles'  => $this->documents,
            'news'      => $this->news,
            'documents' => $this->documents,
        ]);
    }

    public function dokumen_kegiatan()
    {
        return view('documents')->with([
            'articles'    => Document::where('category', 'kegiatan')->get(),
            'news'      => $this->news,
            'documents' => $this->documents,
        ]);
    }
}
