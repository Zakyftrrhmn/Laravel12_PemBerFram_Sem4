<?php

namespace App\Http\Controllers;

use App\Models\Send;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $send = Send::all();
        return view('send.index', compact('send'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('send.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Melakukan validasi data
        $request->validate(
            [
                'no_agenda'   => 'required|max:45',
                'jenis_surat' => 'required|max:45',
            ],
            [
                'no_agenda.required'   => 'Nama wajib diisi',
                'no_agenda.max'        => 'Nama maksimal 45 karakter',
                'jenis_surat.required' => 'Jenis wajib diisi',
                'jenis_surat.max'      => 'Jenis maksimal 45 karakter',
            ]
        );


        // Tambah data ke tabel inboxes
        DB::table('sends')->insert([
            'no_agenda'     => $request->no_agenda,
            'jenis_surat'   => $request->jenis_surat,
            'tanggal_kirim' => $request->tanggal_kirim,
            'no_surat'   => $request->no_surat,
            'pengirim'      => $request->pengirim,
            'perihal'       => $request->perihal,
        ]);

        return redirect()->route('send.index');
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
    public function edit(Send $id)
    {

        return view('send.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $request->validate([
            'no_agenda' => 'required|max:45',
            'jenis_surat' => 'required|max:45',
        ], [
            'no_agenda.required' => 'Nomor agenda wajib diisi',
            'no_agenda.max' => 'Nomor agenda maksimal 45 karakter',
            'jenis_surat.required' => 'Jenis surat wajib diisi',
            'jenis_surat.max' => 'Jenis surat maksimal 45 karakter',
        ]);


        // Update data ke database
        DB::table('sends')->where('id', $id)->update([
            'no_agenda' => $request->no_agenda,
            'jenis_surat' => $request->jenis_surat,
            'tanggal_kirim' => $request->tanggal_kirim,
            'no_surat' => $request->no_surat,
            'pengirim' => $request->pengirim,
            'perihal' => $request->perihal,
        ]);

        // Redirect ke halaman index
        return redirect()->route('send.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Send $id)
    {
        $id->delete();
        return redirect()->route('send.index')->with('success', 'Data berhasil di hapus');
    }
}
