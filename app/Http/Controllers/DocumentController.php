<?php

namespace App\Http\Controllers;

use App\Document;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Resources\DocumentResource;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    public function index()
    {
        $items = Document::whereIn('category', ['Kegiatan', 'Slider'])->get();
        return datatables($items)
            ->addColumn('action', function ($items) {
                return
                    '
                <a href="' . env('APP_URL') . $items->file . '" class="mb-1 mx-0 btn btn-info btn-sm btn-icon-split" target="_blank"> <span class="icon text-white-50"> <i class="fa fa-eye"></i> </span> </a>
                <a href="" class="btnEdit mb-1 mx-0 btn btn-secondary btn-sm btn-icon-split" data-url="' . route('v2.file.show', $items->id) . '"> <span class="icon text-white-50"> <i class="fas fa-pencil-alt"></i> </span> </a>
                <a href="" class="btnDelete mb-1 btnDelete btn btn-danger btn-icon-split btn-sm" data-url="' . route('v2.file.destroy', $items->id) . '"><span class="icon text-white-50"> <i class="fas fa-trash-alt"></i> </span></a>
            ';
            })
            ->editColumn('file', function ($items) {
                return '<img style="" class="rounded img-fluid" src="../' . $items->file . '"/>';
            })
            ->rawColumns(['file', 'action'])
            ->toJson();
    }

    public function create()
    {
        $items = Document::whereIn('category', ['Dokumen'])->get();
        return datatables($items)
            ->addColumn('action', function ($items) {
                return
                    '
                <a href="" class="btnEdit mb-1 mx-0 btn btn-secondary btn-sm btn-icon-split" data-url="' . route('v2.file.show', $items->id) . '"> <span class="icon text-white-50"> <i class="fas fa-pencil-alt"></i> </span> </a>
                <a href="" class="btnDelete mb-1 btnDelete btn btn-danger btn-icon-split btn-sm" data-url="' . route('v2.file.destroy', $items->id) . '"><span class="icon text-white-50"> <i class="fas fa-trash-alt"></i> </span></a>
            ';
            })
            ->editColumn('file', function ($items) {
                return '<a href="' . env('APP_URL') . $items->file . '" class="mb-1 mx-0 btn btn-info btn-sm btn-icon-split" target="_blank"> <span class="icon text-white-50"> <i class="fa fa-eye"></i> </span> </a>';
            })
            ->rawColumns(['file', 'action'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'title' => 'required',
            'category' => 'required'
        ]);

        $name = Str::slug($request->title) . '-' . Carbon::now()->format('dmYhis') . '.' . $request->file('file')->getClientOriginalExtension();
        $img = $request->file('file')->storeAs('images', $name, 'public_uploads_v2');

        $item = Document::create($request->all());
        $item->file = $img;
        $item->save();
        return response()->json($item);
    }

    public function show($id)
    {
        return new DocumentResource(Document::find($id));
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'file' => Rule::requiredIf($request->has('file')),
            'title' => Rule::requiredIf($request->has('title')),
            'category' => Rule::requiredIf($request->has('category')),
        ]);

        $item = Document::find($id);
        if ($request->hasFile('file')) :

            file_exists($item->file) ? unlink($item->file) : '';

            $name = Str::slug($item->title) . '-' . Carbon::now()->format('dmYhis') . '.' . $request->file('file')->getClientOriginalExtension();
            $img = $request->file('file')->storeAs('images', $name, 'public_uploads_v2');

            $item->update($request->except('file'));
            $item->update([
                'file' => $img
            ]);
        else :
            $item->update($request->all());
        endif;
        return response()->json([
            'data'      => $item,
            'status'    => 'Update Success',
        ]);
    }

    public function destroy($id)
    {
        $item   = Document::find($id);
        $cek    = file_exists($item->file) ? unlink($item->file) : 'tidak ada';
        $item->delete();

        return response()->json([
            'status'    => 'Delete Success'
        ]);
    }
}
