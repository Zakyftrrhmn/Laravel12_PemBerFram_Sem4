@extends('layouts.main')
@section('title', 'Edit Surat Masuk')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Data Surat Keluar</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="" class="text-primary text-decoration-none">Dashboard</a> / Edit Data Surat Keluar</li>
    </ol>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Data
        </div>
        
        <div class="card-body">
            <form action="{{ route('send.update', $id->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="no_agenda">Nomor Agenda:</label>
                    <input type="text" class="form-control @error('no_agenda') is-invalid @enderror" 
                           id="no_agenda" name="no_agenda" value="{{ $id->no_agenda }}">
                    @error('no_agenda')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_surat">Jenis Surat:</label>
                    <input type="text" class="form-control @error('jenis_surat') is-invalid @enderror" 
                           id="jenis_surat" name="jenis_surat" value="{{ $id->jenis_surat }}">
                    @error('jenis_surat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_kirim">Tanggal Kirim:</label>
                    <input type="date" class="form-control @error('tanggal_kirim') is-invalid @enderror" 
                           id="tanggal_kirim" name="tanggal_kirim" value="{{ $id->tanggal_kirim }}">
                    @error('tanggal_kirim')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_surat">Nomor Surat:</label>
                    <input type="text" class="form-control" id="no_surat" name="no_surat" value="{{ $id->no_surat }}">
                </div>

                <div class="form-group">
                    <label for="pengirim">Pengirim:</label>
                    <input type="text" class="form-control" id="pengirim" name="pengirim" value="{{ $id->pengirim }}">
                </div>

                <div class="form-group">
                    <label for="perihal">Perihal:</label>
                    <input type="text" class="form-control" id="perihal" name="perihal" value="{{ $id->perihal }}">
                </div>

                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
