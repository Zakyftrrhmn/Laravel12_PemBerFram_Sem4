@extends('layouts.main')
@section('title', 'Edit Disposition')
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Disposition</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Disposition</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tambah data
        </div>
        <div class="card-body">
            <form action="{{ route('disposition.update', $disposition->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="no_disposisi">Nomor Disposisi:</label>
                    <input type="text" class="form-control @error('no_disposisi') is-invalid @enderror" id="no_disposisi" name="no_disposisi" value="{{ $disposition->no_disposisi }}">
                    @error('no_disposisi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inbox_id">Surat Masuk</label>
                    <select name="inbox_id" class="form-control @error('inbox_id') is-invalid @enderror">
                        <option value="{{ $disposition->inbox_id }}" selected>
                            {{ $disposition->inbox->no_surat ?? '-- Pilih Surat Masuk --' }}
                        </option>
                        @foreach ($inbox->where('relasi', '<', 1) as $i)
                            <option value="{{ $i->id }}">{{ $i->no_surat }}</option>
                        @endforeach
                    </select>
                    @error('inbox_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kepada">Kepada:</label>
                    <input type="text" class="form-control @error('kepada') is-invalid @enderror" id="kepada" name="kepada" value="{{ $disposition->kepada }}">
                    @error('kepada')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ $disposition->keterangan }}">
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status_surat">Status Surat:</label>
                    <select class="form-control @error('status_surat') is-invalid @enderror" id="status_surat" name="status_surat">
                        <option value="">-- Pilih Status --</option>
                        <option value="Belum di-Disposisikan" {{ $disposition->status_surat == 'Belum di-Disposisikan' ? 'selected' : '' }}>Belum di-Disposisikan</option>
                        <option value="Di-Disposisikan" {{ $disposition->status_surat == 'Di-Disposisikan' ? 'selected' : '' }}>Di-Disposisikan</option>
                        <option value="Selesai di-Disposisikan" {{ $disposition->status_surat == 'Selesai di-Disposisikan' ? 'selected' : '' }}>Selesai di-Disposisikan</option>
                    </select>
                    @error('status_surat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggapan">Tanggapan:</label>
                    <input type="text" class="form-control @error('tanggapan') is-invalid @enderror" id="tanggapan" name="tanggapan" value="{{ $disposition->tanggapan }}">
                    @error('tanggapan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-4">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
