<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use App\Models\Transportation;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rutes.index', [
            'rutes' => Rute::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return Transportation::latest()->get();
        return view('admin.rutes.create', [
            'transportations' => Transportation::latest()->get(),
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
            'transportation_id' => 'required|exists:transportations,id',
            'tujuan' => 'required',
            'rute_awal' => 'required',
            'rute_akhir' => 'required',
            'harga' => 'required|numeric',
        ]);
        $data['transportation_id'] = $request->transportation_id;
        Rute::create($data);
        return redirect()->route('rutes.index')->with('success', 'Rute berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rute  $rute
     * @return \Illuminate\Http\Response
     */
    public function show(Rute $rute)
    {
        // return $rute = $rute->load('transportation.type');
        return view('admin.rutes.show', [
            'rute' => $rute->load('transportation.type'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rute  $rute
     * @return \Illuminate\Http\Response
     */
    public function edit(Rute $rute)
    {
        return view('admin.rutes.edit', [
            'rute' => $rute,
            'transportations' => Transportation::latest()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rute  $rute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rute $rute)
    {
        $data = $request->validate([
            'transportation_id' => 'required|exists:transportations,id',
            'tujuan' => 'required',
            'rute_awal' => 'required',
            'rute_akhir' => 'required',
            'harga' => 'required|numeric',
        ]);
        $data['transportation_id'] = $request->transportation_id;
        if ($rute->payment()->count() > 0) {
            return back()->with('error', 'Data tidak bisa diupdate karena sudah dipakai');
        }
        $rute->update($data);
        return redirect()->route('rutes.index')->with('success', 'Rute berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rute  $rute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rute $rute)
    {
        if ($rute->payment()->count() > 0) {
            return back()->with('error', 'Data tidak bisa dihapus karena sudah dipakai');
        }
        $rute->delete();
        return redirect()->route('rutes.index')->with('success', 'Rute berhasil dihapus');
    }
}
