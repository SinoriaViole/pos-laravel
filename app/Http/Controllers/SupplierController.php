<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            //ambil pencarian dari query sting keyboard
            $keyword = $request->query('keyword');
            $suppliers = Supplier::orderBy('nama', 'ASC'); //ambil data supplier dari daatabase

            if ($keyword) {
                $suppliers = $suppliers->where('nama', 'like', '%' . $keyword . '%');
            }
            $suppliers = $suppliers->paginate(5);
            return view('supplier.includes.list', compact('suppliers'));
        }
        return view('supplier.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama'      => 'required',
                'alamat'    => 'required',
                'telepon'   => 'required',
            ]);

            $supplier = new Supplier;
            $supplier->nama = $request->nama;
            $supplier->alamat = $request->alamat;
            $supplier->telepon = $request->telepon;

            $supplier->save();
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
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id); // Ganti Supplier dengan nama model yang sesuai
        return view('supplier.edit', compact('supplier'));
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'nama'      => 'required',
            'alamat'    => 'required',
            'telepon'   => 'required',
        ]);

        $supplier->update([
            'nama'=> $request->nama,
            'alamat'=> $request->alamat,
            'telepon'=> $request->telepon,

            
        ]);
        

        return redirect()->route('supplier.index')->with('success', 'Supplier berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return response()->json(([
            'status'    => 1,
            'message'   => 'supplier Berhasil dihapus'
          ]));
            }
        }