<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Flysystem\File;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
  
    public function artikel()
    {
        return view('admin.article.index')->with([
            'items' => \App\Article::paginate()
        ]);
    }
  
    public function foto()
    {
        return view('admin.foto');
    }
}
