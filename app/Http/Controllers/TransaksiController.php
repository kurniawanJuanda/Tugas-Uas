<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;

class TransaksiController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows        = Transaksi::all();
        $dtPelanggan = Pelanggan::all();
        $dtLayanan   = Layanan::all();

        return view('transaksi.index', compact('rows', 'dtPelanggan', 'dtLayanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $layanan = Layanan::find($request->jenis_layanan);

        if (!$layanan) {
            return redirect('/transaksi');
        }

        $transaksi = Transaksi::create([
            'pelanggan_id' => $request->nama_pelanggan,
            'layanan_id' => $request->jenis_layanan,
            'waktu' => Carbon::now(),
            'total_harga' => 0,
            'berat' => $request->berat,
            'tgl_selesai' => $request->tgl_selesai,
            'status' => 'Menunggu',
        ]);

        $transaksi->update([
            'total_harga' => $request->berat * $layanan->biaya_layanan,
        ]);

        return redirect('/transaksi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $row = Transaksi::find($request->id);
        return view('transaksi.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'status' => $request->status,
        ]);

        return redirect('/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        return redirect('/transaksi');
    }
}
