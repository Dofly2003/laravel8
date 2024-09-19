<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PesanController extends Controller
{
    public function index()
    {
        $title = 'Pesan';
        $pesan = Pesan::all();
        return view('admin.pesan.index', compact('title', 'pesan'));
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'no_whatsapp' => [
                'required',
                'string',
                'max:255',
                'regex:/^[0-9]{10,15}$/' // Validasi untuk memastikan hanya nomor telepon (10-15 digit)
            ],
            'message' => 'required|string',
        ], [
            'no_whatsapp.regex' => 'Nomor WhatsApp harus berupa angka dan memiliki panjang 10 hingga 15 digit.', // Custom error message
        ]);

        // Buat cache key berdasarkan nomor WhatsApp dan IP Address
        $cacheKeyWhatsApp = 'pesan_whatsapp_' . $request->no_whatsapp;
        $cacheKeyIP = 'pesan_ip_' . $request->ip();

        // Cek apakah pengguna sudah pernah mengirimkan pesan berdasarkan WhatsApp atau IP dalam 10 menit terakhir
        if (Cache::has($cacheKeyWhatsApp) || Cache::has($cacheKeyIP)) {
            return redirect()->back()->withErrors(['error' => 'Anda sudah mengirimkan pesan. Silakan tunggu beberapa menit sebelum mengirim lagi.']);
        }

        // Simpan pesan ke database
        Pesan::create([
            'name' => $request->name,
            'instansi' => $request->instansi,
            'jabatan' => $request->jabatan,
            'kota' => $request->kota,
            'no_whatsapp' => $request->no_whatsapp,
            'message' => $request->message
        ]);

        // Simpan informasi nomor WhatsApp dan IP address di cache selama 10 menit
        Cache::put($cacheKeyWhatsApp, true, now()->addMinutes(5));
        Cache::put($cacheKeyIP, true, now()->addMinutes(5));

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Pesan Anda telah dikirim!');
    }


    public function show(Pesan $pesan, $id)
    {
        $title = 'Single View';
        $pesan = Pesan::findOrFail($id);
        return view('admin.pesan.show', compact('pesan', 'title'));
    }


}
