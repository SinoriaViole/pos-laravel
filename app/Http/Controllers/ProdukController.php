<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keyword = $request->query('keyword');
            $produks = Product::orderBy('nama_produk', 'ASC')
                ->where('nama_produk', 'like', '%' . $keyword . '%')
                ->paginate(5);


            return view('produk.includes.list', compact('produks'));
        }

        $produks = Product::orderBy('nama_produk', 'ASC')->paginate(5);
        $categories = Category::all();

        return view('produk.index', compact('produks', 'categories'));
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
        try {
            // Validasi input
            $request->validate([
                'id_kategori' => 'required',
                'kode_produk' => 'required',
                'nama_produk' => 'required|max:255',
                'merk' => 'required|max:255',
                'harga_beli' => 'required|numeric',
                'diskon' => 'nullable|numeric',
                'harga_jual' => 'required|numeric',
                'stok' => 'required|numeric',
            ]);

            // Buat instance Produk baru
            $produk = new Product();
            $produk->category_id = $request->id_kategori;
            $produk->kode_produk = $request->kode_produk;
            $produk->nama_produk = $request->nama_produk;
            $produk->merk = $request->merk;
            $produk->harga_beli = $request->harga_beli;
            $produk->diskon = $request->diskon;
            $produk->harga_jual = $request->harga_jual;
            $produk->stok = $request->stok;

            // Simpan data produk baru
            $produk->save();

            return response()->json([
                'status'  => 1,
                'message' => 'Berhasil disimpan'
            ]);

            // Redirect ke halaman index dengan pesan sukses
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
        $produk = Product::findOrFail($id); // Temukan produk berdasarkan ID
        $kategoris = Category::all(); // Ambil data kategori
        return view('produk.edit', compact('produk', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_produk' => 'required|max:255',
            'merk' => 'required|max:255',
            'harga_beli' => 'required|numeric',
            'diskon' => 'nullable|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        $produk = Product::findOrFail($id);
        $produk->category_id = $request->id_kategori;
        $produk->nama_produk = $request->nama_produk;
        $produk->merk = $request->merk;
        $produk->harga_beli = $request->harga_beli;
        $produk->diskon = $request->diskon;
        $produk->harga_jual = $request->harga_jual;
        $produk->stok = $request->stok;
        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $produk)
    {
        $produk->delete();

        return response()->json(([
            'status'    => 1,
            'message'   => 'Produk Berhasil dihapus'
        ]));
    }
}
