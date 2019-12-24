<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard')->with([
            'articles'      => \App\Article::whereIn('category', ['kegiatan', 'blog'])->orderBy('updated_at', 'desc')->get(),
            'photos'        => \App\Document::where('category', 'kegiatan')->get(),
            'sliders'       => \App\Document::where('category', 'slider')->get(),
            'news'          => \App\Article::whereIn('category', ['pengumuman'])->orderBy('updated_at', 'desc')->paginate(5),
            'documents'     => \App\Document::whereIn('category', ['Postingan', 'Dokumen'])->orderBy('updated_at', 'desc')->paginate(5),
            'users'         => \App\User::all(),
        ]);
    }

    public function articles()
    {
        return view('admin.articles');
    }

    public function files()
    {
        return view('admin.files');
    }

    public function documents()
    {
        return view('admin.documents');
    }

    public function galleries()
    {
        return view('admin.galleries');
    }

    public function reviews()
    {
        return view('admin.reviews');
    }

    public function users()
    {
        return view('admin.users');
    }
}
