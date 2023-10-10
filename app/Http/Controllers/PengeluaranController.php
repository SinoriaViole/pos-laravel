<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $pengeluarans = Pengeluaran::orderBy('deskripsi', 'ASC'); // Query pengeluaran dari database, diurutkan berdasarkan deskripsi

        // Ambil data pencarian dari query string "keyword"
        $keyword = $request->query('keyword');

        if ($keyword) {
            $pengeluarans = $pengeluarans->where('deskripsi', 'like', '%' . $keyword . '%');
        }

        if ($request->ajax()) {
            $pengeluarans = $pengeluarans->paginate(5);
            return view('pengeluaran.includes.list', compact('pengeluarans'));
        }

        $pengeluarans = $pengeluarans->paginate(5);
        return view('pengeluaran.index', compact('pengeluarans'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'deskripsi' => 'required',
                'nominal' => 'required',
                'tanggal' => 'required',
            ]);

            $pengeluaran = new Pengeluaran;
            $pengeluaran->deskripsi = $request->deskripsi;
            $pengeluaran->nominal = $request->nominal;
            $pengeluaran->tanggal = $request->tanggal;

            $pengeluaran->save();

            return response()->json([
                'status'  => 1,
                'message' => 'Berhasil disimpan'
            ]);
        } catch (\Exception $e) {
            // Tampilkan error jika terjadi masalah di database
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pengeluaran.edit', compact('pengeluaran'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'nominal' => 'required',
        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->update($request->all());

        return redirect()->route('pengeluaran.index')
            ->with('success', 'Pengeluaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return response()->json(([
            'status' => 1,
            'message' => 'Data berhasil dihapus'
        ]));
    }
}
