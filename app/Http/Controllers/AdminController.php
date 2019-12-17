<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function dashboard()
    {
        // return view('admin.dashboard');
        return view('admin.articles');
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
