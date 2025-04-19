@extends('layouts.main')
@section('title', 'Tambah User')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="" class="text-primary text-decoration-none">Dashboard</a> / Tambah Data User</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tambah Data
            </div>
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name">Nama Petugas</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email Petugas</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password </label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="role">Role Petugas</label>
                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>

                        @error('role')

                            <div class="invalid-feedback">{{ $message }}</div>

                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection