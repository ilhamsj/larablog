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
        return view('admin.article')->with([
            'items' => \App\Article::paginate()
        ]);
    }
  
    public function foto()
    {
        return view('admin.foto');
    }
  
    public function document()
    {
        return view('admin.documents');
    }
  
    public function gallery()
    {
        return view('admin.gallery');
    }
  
    public function reviews()
    {
        return view('admin.reviews');
    }
}
