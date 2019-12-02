<?php

namespace App\Http\Controllers;

use App\Article;
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
                    <a href="'.route('user.artikel.show', $items->id).'" class="mx-0 btn btn-info btn-sm btn-icon-split" target="_blank"> <span class="icon text-white-50"> <i class="fa fa-eye"></i> </span> </a>
                    <a href="'.route('artikel.show', $items->id).'" class="btnEdit mx-0 btn btn-secondary btn-sm btn-icon-split"> <span class="icon text-white-50"> <i class="fas fa-pencil-alt"></i> </span> </a>
                    <a href="" class="btnDelete btn btn-danger btn-icon-split btn-sm" data-url="'.route('artikel.destroy', $items->id).'"><span class="icon text-white-50"> <i class="fas fa-trash-alt"></i> </span></a>
                ';
            })
            ->toJson();
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|min:20|max:50',
            'content'   => 'required|min:200'
        ]);

        $artikel = Article::create($request->all());
        
        return response()->json([
            'status' => $request->title . ' Berhasil ditambahkan'
        ]);
    }

    public function show($id)
    {
        return response()->json(Article::find($id));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $item = Article::find($id);
        $item->update($request->all());
        return response()->json($item->title . ' Berhasil di Update');
    }

    public function destroy($id)
    {
        $item = Article::find($id);
        $item->delete($item);
        return response()->json($item->title . ' Berhasil dihapus');
    }
}
