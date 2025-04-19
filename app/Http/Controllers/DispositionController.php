<?php

namespace App\Http\Controllers;

use App\Models\Disposition;
use Illuminate\Http\Request;
use App\Models\Inbox;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DispositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inbox = Inbox::all();
        $disposition = Disposition::all();
        return view('disposition.index', compact('disposition', 'inbox'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inbox = Inbox::all();
        return view('disposition.create', compact('inbox'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_disposisi' => 'required',
            'kepada' => 'required',
            'keterangan' => 'required',
            'status_surat' => 'required',
            'tanggapan' => 'required',
            'inbox_id' => 'required',
        ]);

        // $disposition = Disposition::create($request->all());
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Disposition::create($data);

        Inbox::where('id', $request->inbox_id)->update(['relasi' => 1]);
        return redirect()->route('disposition.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Disposition $disposition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disposition $disposition)
    {
        $inbox = Inbox::all();
        return view('disposition.edit', compact('disposition', 'inbox'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Disposition $disposition)
    {
        $request->validate([
            'no_disposisi' => 'required',
            'kepada' => 'required',
            'keterangan' => 'required',
            'status_surat' => 'required',
            'tanggapan' => 'required',
        ]);

        $disposition->update($request->all());

        if ($request->inbox_id != $disposition->inbox_id) {
            Inbox::where('id', $disposition->inbox_id)->update(['relasi' => 0]);
            Inbox::where('id', $request->inbox_id)->update(['relasi' => 1]);
        }

        return redirect()->route('disposition.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disposition $disposition)
    {
        Inbox::where('id', $disposition->inbox_id)->update(['relasi' => 0]);
        $disposition->delete();
        return redirect()->route('disposition.index')->with('success', 'Data berhasil di hapus');
    }
}
