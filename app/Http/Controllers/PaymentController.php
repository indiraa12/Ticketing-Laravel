<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Rute;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::with(['penumpang', 'rute', 'user'])->get();
        // return $payments;
        return view(
            "admin.pemesanan.index",
            [
                "payments" => Payment::with(['penumpang', 'rute', 'user'])->latest()->get(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = User::where('role_id', 1)->first();
        $data = $request->validate([
            'rute_id' => 'required|exists:rutes,id',
            'tanggal_berangkat' => 'required',
            'total_bayar' => 'required',
        ]);
        $data['penumpang_id'] = auth()->user()->id;
        $data['user_id'] = $users->role_id;
        $data['kode_pemesanan'] = 'CK-' . auth()->user()->id . rand(10000, 99999);
        $data['tempat_pemesanan'] = 'Tiket Online';
        $data['kode_kursi'] = 'K-' . rand(10, 99);
        $data['tanggal_pemesanan'] = now();
        $data['tanggal_berangkat'] = $request->tanggal_berangkat;
        $data['jam_cekin'] = Carbon::parse($data['tanggal_berangkat'])->hour(6)->minute(0)->second(0);
        $data['jam_berangkat'] = Carbon::parse($data['tanggal_berangkat'])->hour(8)->minute(0)->second(0);
        $data['total_bayar'] = $request->total_bayar;

        // check tanggal berangkat
        if ($data['tanggal_berangkat'] < date('Y-m-d')) {
            return back()->with('error', 'Tanggal Berangkat Tidak Boleh Kurang Dari Hari Ini');
        }

        // check duplicate
        $checkDuplicate = Payment::where('penumpang_id', auth()->user()->id)->where('rute_id', $request->rute_id)->where('tanggal_berangkat', $request->tanggal_berangkat)->first();
        if ($checkDuplicate) {
            return back()->with('error', 'Anda Sudah Melakukan Pemesanan Pada Tanggal Tersebut');
        }

        // check total bayar
        $hargaRute = Rute::find($request->rute_id);
        if ($request->total_bayar < $hargaRute->harga) {
            return back()->with('error', 'Total Bayar Tidak Boleh Kurang Dari Harga Yang Sudah Di Tentukan');
        } else if ($request->total_bayar > $hargaRute->harga) {
            return back()->with('error', 'Total Bayar Tidak Boleh Lebih Dari Harga Yang Sudah Di Tentukan');
        }

        Payment::create($data);
        return redirect()->route('pemesanan.index')->with('success', 'Pembayaran Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        $payment = $payment->load(['penumpang', 'rute.transportation.type', 'user']);
        // return $payment;
        return view("admin.pemesanan.show", [
            "payment" => $payment->load(['penumpang', 'rute.transportation.type', 'user']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return back()->with('success', 'Pembayaran Berhasil Dihapus');
    }
}
