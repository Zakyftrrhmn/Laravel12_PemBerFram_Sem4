<?php

namespace App\Http\Controllers;

use App\Models\Inbox;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inbox = Inbox::all();
        return view('inbox.index', compact('inbox'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inbox.create');
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
                'foto'        => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ],
            [
                'no_agenda.required'   => 'Nama wajib diisi',
                'no_agenda.max'        => 'Nama maksimal 45 karakter',
                'jenis_surat.required' => 'Jenis wajib diisi',
                'jenis_surat.max'      => 'Jenis maksimal 45 karakter',
                'foto.max'             => 'Foto maksimal 2 MB',
                'foto.mimes'           => 'File ekstensi hanya bisa jpg, png, jpeg, gif, svg',
                'foto.image'           => 'File harus berbentuk image',
            ]
        );

        // Jika file foto ada yang terupload
        if ($request->hasFile('foto')) {
            // Proses penyimpanan foto
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('image'), $fileName);
        } else {
            $fileName = 'nophoto.jpg';
        }

        // $disposition = Disposition::create($request->all());
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Inbox::create($data);

        return redirect()->route('inbox.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('inbox.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inbox $id)
    {
        return view('inbox.edit', compact('id'));
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
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ], [
            'no_agenda.required' => 'Nomor agenda wajib diisi',
            'no_agenda.max' => 'Nomor agenda maksimal 45 karakter',
            'jenis_surat.required' => 'Jenis surat wajib diisi',
            'jenis_surat.max' => 'Jenis surat maksimal 45 karakter',
            'foto.max' => 'Ukuran foto maksimal 2 MB',
            'foto.mimes' => 'Ekstensi file hanya bisa jpg, png, jpeg, gif, atau svg',
            'foto.image' => 'File harus berupa gambar',
        ]);

        // Ambil foto lama dari database
        $fotoLama = DB::table('inboxes')->where('id', $id)->value('foto');

        // Jika ada foto baru yang diunggah
        if (!empty($request->foto)) {
            // Hapus foto lama jika ada
            if (!empty($fotoLama) && file_exists(public_path('image/' . $fotoLama))) {
                unlink(public_path('image/' . $fotoLama));
            }

            // Proses unggah foto baru
            $fileName = 'foto-' . $id . '.' . $request->foto->extension();
            $request->foto->move(public_path('image'), $fileName);
        } else {
            $fileName = $fotoLama; // Gunakan foto lama jika tidak ada yang baru
        }

        // Update data ke database
        DB::table('inboxes')->where('id', $id)->update([
            'no_agenda' => $request->no_agenda,
            'jenis_surat' => $request->jenis_surat,
            'tanggal_kirim' => $request->tanggal_kirim,
            'tanggal_terima' => $request->tanggal_terima,
            'no_surat' => $request->no_surat,
            'pengirim' => $request->pengirim,
            'perihal' => $request->perihal,
            'foto' => $fileName,
        ]);

        // Redirect ke halaman index
        return redirect()->route('inbox.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inbox $id)
    {
        $id->delete();
        return redirect()->route('inbox.index')->with('success', 'Data berhasil di hapus');
    }
}
