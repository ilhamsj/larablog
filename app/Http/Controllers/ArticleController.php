<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Resources\TestResource;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $items = Article::all();
        return datatables($items)
            ->addIndexColumn()
            ->addColumn('action', function ($items) {
                return 
                '
                    <a href="'.route('user.artikel.show', $items->id).'" target="_blank" class="btnEdit mx-0 btn btn-info btn-sm btn-icon-split"> <span class="icon text-white-50"> <i class="fa fa-eye"></i> </span> </a>
                    <a href="" class="btnEdit mx-0 btn btn-secondary btn-sm btn-icon-split"> <span class="icon text-white-50"> <i class="fas fa-pencil-alt"></i> </span> </a>
                    <a href="" class="btnDelete btn btn-danger btn-icon-split btn-sm" data-url="'.route('artikel.destroy', $items->id).'"><span class="icon text-white-50"> <i class="fas fa-trash-alt"></i> </span></a>
                ';
            })
            // ->editColumn('created_at', function($items) {
            //     return $items->created_at->format('d F Y');
            // })
            ->toJson();
    }


    public function create()
    {
        return view('admin.article.create');
    }

    public function store(Request $request)
    {
        Article::create($request->all());
        
        return response()->json([
            'status' => $request->all()
        ]);
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
        Article::destroy($id);
        return response()->json($id);
    }
}
