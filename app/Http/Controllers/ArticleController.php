<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

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
                    <a href="' . route('user.artikel.show', $items->slug) . '" class="mx-0 btn btn-info btn-sm btn-icon-split" target="_blank"> <span class="icon text-white-50"> <i class="fa fa-eye"></i> </span> </a>
                    <a href="' . route('artikel.show', $items->id) . '" class="btnEdit mx-0 btn btn-secondary btn-sm btn-icon-split"> <span class="icon text-white-50"> <i class="fas fa-pencil-alt"></i> </span> </a>
                    <a href="" class="btnDelete btn btn-danger btn-icon-split btn-sm" data-url="' . route('artikel.destroy', $items->id) . '"><span class="icon text-white-50"> <i class="fas fa-trash-alt"></i> </span></a>
                ';
            })
            ->editColumn('cover', function ($items) {
                return '<img style="" class="rounded img-fluid" src="../' . $items->cover . '"/>';
            })
            ->rawColumns(['action', 'cover'])
            ->toJson();
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|min:20|max:50|unique:articles',
            'content'   => 'required|min:200',
            'category'  => 'required',
            'cover'     => 'required',
        ]);

        $slug = Str::slug($request->title);
        $name = $slug . '-' . Carbon::now()->format('dmYhis') . '.' . $request->file('cover')->getClientOriginalExtension();
        $img = $request->file('cover')->storeAs('images', $name, 'public_uploads_v2');

        $item = Article::create($request->all());
        $item->cover    = $img;
        $item->slug     = $slug;
        $item->save();

        return response()->json([
            'item'  => $item,
            'status' => 'Store Success'
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
        $request->validate([
            'title'     => Rule::requiredIf($request->has('title')),
            'content'   => Rule::requiredIf($request->has('content')),
            'category'  => Rule::requiredIf($request->has('category')),
            'cover'     => Rule::requiredIf($request->has('cover')),
        ]);

        $item = Article::find($id);
        $slug = Str::slug($request->title);

        if ($request->hasFile('cover')) :

            file_exists($item->cover) ? unlink($item->cover) : '';

            $name = $slug . '-' . Carbon::now()->format('dmYhis') . '.' . $request->file('cover')->getClientOriginalExtension();
            $img = $request->file('cover')->storeAs('images', $name, 'public_uploads_v2');

            $item->update($request->all());
            $item->update([
                'cover' => $img,
                'slug' => $slug,
            ]);
        else :
            $item->update($request->all());
            $item->update([
                'slug' => $slug,
            ]);
        endif;

        return response()->json([
            'data'      => $item,
            'status'    => 'Update Success',
        ]);
    }

    public function destroy($id)
    {
        $item = Article::find($id);

        file_exists($item->cover) ? unlink($item->cover) : '';
        $item->delete();

        return response()->json([
            'item'      => $item,
            'status'    => 'Delete Success'
        ]);
    }
}
