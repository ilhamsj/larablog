<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $items = User::all();
        return datatables($items)
            ->addIndexColumn()
            ->addColumn('action', function ($items) {
                return 
                '
                    <a href="" class="btnEdit mx-0 btn btn-secondary btn-sm btn-icon-split" data-url="'.route('user.destroy', $items->id).'"> <span class="icon text-white-50"> <i class="fas fa-pencil-alt"></i> </span> </a>
                    <a href="" class="btnDelete btn btn-danger btn-icon-split btn-sm" data-url="'.route('user.destroy', $items->id).'"><span class="icon text-white-50"> <i class="fas fa-trash-alt"></i> </span></a>
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
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'role'      => ['required'],
        ]);

        $request->merge([
            'password' => bcrypt($request->password)
        ]);
        $item = User::create($request->all());
        
        return response()->json([
            'item'  => $request->all(),
            'status' => 'Store Success'
        ]);
    }

    public function show($id)
    {
        return response()->json(User::find($id));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $item = User::find($id);
        $request->validate([
            'name'      => [Rule::requiredIf($request->has('name')), 'string','max:255'],
            'email'     => [Rule::requiredIf($request->has('email')), 'email'],
            'password'  => [Rule::requiredIf($request->has('password')), 'confirmed'],
            'role'      => [Rule::requiredIf($request->has('role'))],
        ]);

        $request->merge([
            'password' => bcrypt($request->password)
        ]);
        $item->update($request->all());

        return response()->json([
            'data'      => $request->all(),
            'status'    => 'Update Success',
        ]);
    }

    public function destroy($id)
    {
        $item = User::find($id);
        $item->delete();

        return response()->json([
            'item'      => $item,
            'status'    => 'Delete Success'
        ]);
    }
}
