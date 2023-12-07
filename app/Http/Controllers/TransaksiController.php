<?php

namespace App\Http\Controllers;

use App\Models\coustumer;
use App\Models\Kendaraan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TransaksiController extends Controller
{
    public function index()
    {
        $datas = Transaksi::latest()->paginate(10);

        return view('transaksi.index', [
            'datas' => $datas
        ]);
    }

    public function create()
    {
        $coustumer = coustumer::orderBy('id', 'asc')->get();
        $kendaraan = Kendaraan::orderBy('id', 'asc')->get();
        return view('transaksi.create', [
            'coustumer' => $coustumer,
            'kendaraan' => $kendaraan
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'coustumer_id' => 'required',
            'kendaraan_id' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'harga' => 'required',
        ]);

        Transaksi::create([
            'coustumer_id' => $request->coustumer_id,
            'kendaraan_id' => $request->kendaraan_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'harga' => $request->harga,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Transaksi::findOrFail($id);
        $coustumer = coustumer::orderBy('id', 'asc')->get();
        $kendaraan = Kendaraan::orderBy('id', 'asc')->get();
        return view('transaksi.edit', [
            'data' => $data,
            'coustumer' => $coustumer,
            'kendaraan' => $kendaraan
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'coustumer_id' => 'required',
            'kendaraan_id' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'harga' => 'required',
        ]);

        $data = Transaksi::findOrFail($id);
        $data->update([
            'coustumer_id' => $request->coustumer_id,
            'kendaraan_id' => $request->kendaraan_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'harga' => $request->harga,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id): RedirectResponse
    {
        $data = Transaksi::findOrFail($id);
        $data->delete();

        return redirect()->route('transaksi.index')->with('success', 'Data berhasil dihapus');
    }
}
