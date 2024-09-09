<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    public function index()
    {
        // Mengambil data kategori dengan pagination
        $kategori = Kategori::paginate(7);
        return view('Admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Kategori::create([
            'name' => $request->name
        ]);

        return redirect()->route('Admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Menampilkan detail kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);
        return view('Admin.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Mengambil data kategori yang akan diedit
        $kategori = Kategori::findOrFail($id);
        return view('Admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update data kategori di database
        $kategori = Kategori::findOrFail($id);
        $kategori->name = $request->name;
        $kategori->save();

        // Redirect kembali ke index dengan pesan sukses
        return redirect()->route('Admin.kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Menghapus kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        // Redirect kembali ke index dengan pesan sukses
        return redirect()->route('Admin.kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
