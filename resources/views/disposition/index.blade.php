@extends('layouts.main')
@section('title', 'Disposition')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Disposition</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="" class="text-primary text-decoration-none">Dashboard</a> / Disposition</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('disposition.create')}}" class="btn btn-sm btn-primary">Tambah Data</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Disposisi</th>
                            <th>Nomor Surat</th>
                            <th>Kepada</th>
                            <th>Status</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nomor Disposisi</th>
                            <th>Nomor Surat</th>
                            <th>Kepada</th>
                            <th>Status</th>
                            <th width="280px">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($disposition as $d)
                        <tr>
                            <td>{{  $loop->iteration }}</td>
                            <td>{{  $d->no_disposisi }}</td>
                            <td>{{  $d->inbox->no_surat }}</td>
                            <td>{{  $d->kepada }}</td>
                            <td>{{  $d->status_surat }}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-secondary">show</a>
                                <a href="{{ route('disposition.edit', $d->id) }}" class="btn btn-sm btn-warning">edit</a>
                                @if(Auth::user()->role == 'admin')
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{$d->id}}">
                                    Hapus
                                </button>
                                @endif
                            
                                <!-- Modal Konfirmasi Hapus -->
                                <div class="modal fade" id="exampleModal{{ $d->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $d->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel{{ $d->id }}">Hapus Surat</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data <strong>{{ $d->no_surat }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <form action="{{ route('disposition.destroy', $d->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection