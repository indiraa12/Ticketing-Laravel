<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class UserPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::with(['penumpang', 'rute', 'user'])->where('penumpang_id', auth()->user()->id)->get();
        // return $payments;
        return view(
            "pemesanan.index",
            ["payments" => Payment::with(['penumpang', 'rute', 'user'])->latest()->where('penumpang_id', auth()->user()->id)->get(),]
        );
    }

    public function show(Payment $pemesanan)
    {
        // $pesanan = $pesanan->load(['penumpang', 'rute.transportation.type', 'user']);
        // return $pesanan;
        return view("pemesanan.show", [
            "pesanan" => $pemesanan->load(['penumpang', 'rute.transportation.type', 'user']),
        ]);
    }

    public function destroy(Payment $pemesanan)
    {
        $pemesanan->delete();
        return redirect("pemesanan")->with("success", "History Pembayaran Berhasil Dihapus");
    }
}
