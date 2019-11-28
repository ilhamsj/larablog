<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Resources\TestResource;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return datatables()->collection(Article::all())->toJson();
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {

    }
}
