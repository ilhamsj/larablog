<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with([
            'news'       => \App\Article::whereIn('category', ['pengumuman'])->orderBy('updated_at', 'desc')->paginate(5),
            'documents'  => \App\Document::whereIn('category', ['Postingan', 'Dokumen'])->orderBy('updated_at', 'desc')->paginate(5),
        ]);
    }
}
