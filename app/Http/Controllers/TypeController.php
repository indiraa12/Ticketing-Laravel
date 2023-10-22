<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->cari) {
            $type = Type::where("nama_type", "LIKE", "%" . $request->cari . "%")
                ->get();
        } else {
            $type = Type::latest()->get();
        }
        return view('admin/type/index', compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.type.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Type::create($request->all());
        return redirect('/admin/type')->with('success', 'Tambah Data Sukses!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->all();
        $data['id'] = $request->id;
        if ($type->transportation()->count() > 0) {
            return back()->with("error", "Tidak Bisa Di Edit Karena Data Sudah Di Pakai!!!");
        }
        $type->update($data);
        return redirect('/admin/type')->with('success', 'Edit Data Sukses!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        if ($type->transportation()->count() > 0) {
            return back()->with("error", "Tidak Bisa Di Hapus Karena Data Sudah Di Pakai!!!");
        }
        $type->delete();
        return redirect("/admin/type")->with("success", "Hapus Data Sukses!!!");
    }
}
