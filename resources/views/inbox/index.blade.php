@extends('layouts.main')
@section('title', 'Surat Masuk')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Surat Masuk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="" class="text-primary text-decoration-none">Dashboard</a> / Surat Masuk</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Surat Masuk
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Jenis Surat</th>
                            <th>Tanggal Kirim</th>
                            <th>Tanggal Terima</th>
                            <th>Photo</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Jenis Surat</th>
                            <th>Tanggal Kirim</th>
                            <th>Tanggal Terima</th>
                            <th>Photo</th>
                            <th width="280px">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($inbox as $i)
                        <tr>
                            <td>{{  $loop->iteration }}</td>
                            <td>{{  $i->no_surat }}</td>
                            <td>{{  $i->jenis_surat }}</td>
                            <td>{{  $i->tanggal_kirim }}</td>
                            <td>{{  $i->tanggal_terima }}</td>
                            <td>
                                @empty($i->foto)
                                <img src="{{url('image/nophoto.jpg')}}" alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                                @else
                                <img src="{{url('image')}}/{{$i->foto}}" alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                                @endempty
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-secondary">show</a>
                                <a href="#" class="btn btn-sm btn-warning">edit</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$i->id}}">
                                    hapus
                                </button>
                             </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection