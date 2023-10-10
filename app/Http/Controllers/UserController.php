<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // Ambil data pencarian dari query string keyword
            $keyword = $request->query('keyword');
            $users = User::orderBy('name', 'ASC'); // Ambil data user dari database

            // Jika ada keyword pencarian, lakukan pencarian
            if ($keyword) {
                $users = $users->where('name', 'like', '%' . $keyword . '%');
            }

            $users = $users->paginate(5);

            // Kembalikan data dalam format JSON jika request adalah AJAX
            return response()->json($users);
        }

        // Jika bukan request AJAX, kembalikan view HTML biasa
        $users = User::orderBy('name', 'ASC')->paginate(5); // Sertakan pengambilan data users di sini

        return view('manajemen.index', compact('users'));
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
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                // 'level' => 'required',
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->level = 2;

            $user->save();


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
        //
    }

    /**
     * Update the specified resource in storage.
     */
/**
 * Update the specified resource in storage.
 */
public function update(Request $request, $id)
{        
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('password') && $request->password != "")
        $user->password = $request->password;
        $user->update();

        return response()->json('Data verhasil disimpan', 200);
    }
    
    
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(([
            'status' => 1,
            'message' => 'User Berhasil Dihapus'
        ]));
    }
}
