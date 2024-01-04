<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LayananController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Layanan::all();
        return view('layanan.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $layanan = Layanan::create([
            'jenis_layanan' => $request->jenis_layanan,
            'biaya_layanan' => $request->biaya_layanan,
        ]);

        return redirect('/layanan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $layanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Layanan::find($id);
        return view('layanan.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Layanan::findOrFail($id);

        $row->update([
            'jenis_layanan' => $request->jenis_layanan,
            'biaya_layanan' => $request->biaya_layanan,
        ]);

        return redirect('/layanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $layanan = Layanan::find($id);

        $layanan->delete();

        return redirect('/layanan');
    }
}
