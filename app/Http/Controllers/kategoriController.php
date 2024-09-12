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

    public function create()
    {
        return view('Admin.kategori.create');
    }


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


    public function show($id)
    {
        // Menampilkan detail kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);
        return view('Admin.kategori.show', compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('Admin.kategori.update', compact('kategori'));
    }

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
        $kategori->products()->detach();
        $kategori->delete();

        // Redirect kembali ke index dengan pesan sukses
        return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
    }
}
