<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
