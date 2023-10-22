<?php

namespace App\Http\Controllers;

use App\Models\Transportation;
use App\Models\Type;
use Illuminate\Http\Request;

class TransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.transportations.index", [
            "data_transportation" => Transportation::with('type')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.transportations.create", [
            'type_transportations' => Type::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "type_id" => ["required", "exists:types,id"],
            "jumlah_kursi" => ["required"],
            "keterangan" => ["nullable", "max:255"],
        ]);
        $data["kode"] = "TR" . rand(1000, 9999);
        $data['type_id'] = $request->type_id;
        Transportation::create($data);
        return redirect()->route("transportations.index")->with("success", "Tambah Data Sukses!!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function show(Transportation $transportation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function edit(Transportation $transportation)
    {
        return view("admin.transportations.edit", [
            "transportation" => $transportation,
            'type_transportations' => Type::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transportation $transportation)
    {
        $data = $request->validate([
            "type_id" => ["required", "exists:types,id"],
            "jumlah_kursi" => ["required"],
            "keterangan" => ["nullable", "max:255"],
        ]);
        $data['type_id'] = $request->type_id;
        $data['kode'] = $transportation->kode;
        if($transportation->rute()->count() > 0) {
            return back()->with("error", "Tidak Bisa Di Edit Karena Data Sudah Di Pakai!!!");
        }
        $transportation->update($data);
        return redirect()->route("transportations.index")->with("success", "Update Data Sukses!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transportation $transportation)
    {
        if($transportation->rute()->count() > 0) {
            return back()->with("error", "Tidak Bisa Di Hapus Karena Data Sudah Di Pakai!!!");
        }
        $transportation->delete();
        return back()->with("success", "Hapus Data Sukses!!!");
    }
}
