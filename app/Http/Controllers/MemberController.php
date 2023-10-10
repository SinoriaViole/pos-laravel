<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax() ) {
            //ambil data pencarian dari query sting keyword
            $keyword = $request->query('keyword');
            $members = Member::orderBy('nama', 'ASC'); // Ambil data kategori dari database
            
            //jika ada keyword pencarian ,lakukan pencarian
            if ($keyword) {
                $members = $members->where('nama', 'like', '%' . $keyword . '%');
            }

            $members = $members->paginate(5);
            return view('member.includes.list', compact('members'));
            
        }
        return view('member.index');
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
        try{
        $request->validate([
            'kode_member' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $member = new Member;
        $member->kode_member = $request->kode_member;
        $member->nama = $request->nama;
        $member->alamat = $request->alamat;
        $member->telepon = $request->telepon;
        
        $member->save();
        
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
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('member.edit', compact('member'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'kode_member' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);
    
        $member->update([
            'kode_member' => $request->kode_member,
            'nama'  => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);
    
        return redirect()->route('member.index')->with('success', 'Member berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
        
      //  return redirect()->route('member.index')->with('success', 'Member berhasil dihapus.');
      return response()->json(([
        'status'    => 1,
        'message'   => 'Member Berhasil dihapus'
      ]));
        }
    }
