@extends('layouts.main')
@section('title', 'Tambah Surat Keluar')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Surat Keluar</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="" class="text-primary text-decoration-none">Dashboard</a> / Tambah Data Surat Keluar</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tambah Data
            </div>
            <div class="card-body">
                <form action="{{ route('send.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="no_agenda">Nomor Agenda:</label>
                        <input type="text" class="form-control @error('no_agenda') is-invalid @enderror" id="no_agenda" name="no_agenda" value="{{ old('no_agenda') }}">
                        @error('no_agenda')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenis_surat">Jenis Surat:</label>
                        <input type="text" class="form-control @error('jenis_surat') is-invalid @enderror" id="jenis_surat" name="jenis_surat" value="{{ old('jenis_surat') }}">
                        @error('jenis_surat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_kirim">Tanggal Kirim:</label>
                        <input type="date" class="form-control @error('tanggal_kirim') is-invalid @enderror" id="tanggal_kirim" name="tanggal_kirim" value="{{ old('tanggal_kirim') }}">
                        @error('tanggal_kirim')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="no_surat">Nomor Surat:</label>
                        <textarea class="form-control" id="no_surat" name="no_surat">{{ old('no_surat') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="pengirim">Pengirim:</label>
                        <textarea class="form-control" id="pengirim" name="pengirim">{{ old('pengirim') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="perihal">Perihal:</label>
                        <textarea class="form-control" id="perihal" name="perihal">{{ old('perihal') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection