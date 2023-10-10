<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            //ambil data pencarian dari query string keyword
            $keyword = $request->query('keyword');
            $kategoris = Category::orderBy('nama', 'ASC'); // Ambil data kategori dari database
            
            //jika ada keyword pencarian, lakukan pencarian
            if ($keyword) {
                $kategoris = $kategoris->where('nama', 'like', '%' . $keyword . '%');
            }
    
            $kategoris = $kategoris->paginate(5);
            return view('kategori.includes.list', compact('kategoris'));
        }
    
        // Menambahkan header Cache-Control pada respons HTML
        header('Cache-Control: no-cache');
    
        return view('kategori.index');
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'nama' => 'required|max:255',
            ]);
    
            // Buat instansi Kategori baru
            $kategori = new Category;
            $kategori->nama = $request->nama;
            
    
            // Simpan data kategori baru
            $kategori->save();
    
            // Redirect ke halaman index dengan pesan sukses
           // return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
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
    public function edit(Category $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $kategori)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required|max:255',
        ]);
    
        $kategori->update([
            'nama' => $request->nama,
        ]);
    
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $kategori)
{
    $produk = Product::where('category_id',$kategori->id)->count();
    if ($produk>0) {
        return response()->json([
            'status'  => 0,
            'message' => 'Kategori Tidak Dapat dihapus'
       ]);

    }
    else{
        $kategori->delete();
    //return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    return response()->json([
        'status'  => 1,
        'message' => 'Kategori Berhasil dihapus'
   ]);  
    }
  
}

}
