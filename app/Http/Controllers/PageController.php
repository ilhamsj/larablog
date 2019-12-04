<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        $kegiatan = \App\Article::where('category', 'kegiatan')->get();
        $pengumuman = \App\Article::where('category', 'pengumuman')->get();
        $blog = \App\Article::where('category', 'blog')->paginate(6);
        $images = scandir(\public_path('images'));
        $images = array_diff($images, ['.', '..', 'photo-1520719627573-5e2c1a6610f0.jpg']);
        $images = array_slice($images, 0, 5);

        return view('welcome')->with([
            'items' => $kegiatan,
            'images' => $images,
            'pengumuman' => $pengumuman,
            'blog' => $blog,
        ]);
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

    public function kontak()
    {
        return view('kontak');
    }
}
