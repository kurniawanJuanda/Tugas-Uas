@extends('layouts.app')

@section('content')
    {{-- Tambah Data Modal --}}
    <form action="{{ url('pelanggan/store') }}" method="POST">
        {{ csrf_field() }}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pelanggan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="namaPelanggan" class="form-label">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="nama_pelanggan" id="namaPelanggan">
                        </div>
                        <div class="mb-3">
                            <label for="nohpPelanggan" class="form-label">No Hp Pelanggan</label>
                            <input type="text" class="form-control" name="nohp_pelanggan" id="nohpPelanggan"
                                min="1">
                        </div>
                        <div class="mb-3">
                            <label for="alamatPelanggan" class="form-label">Alamat Pelanggan</label>
                            <input type="text" class="form-control" name="alamat_pelanggan" id="alamatPelanggan"
                                min="1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- Tampil Data --}}
    <div class="container">
        <h1>Data Pelanggan</h1>
        <hr>
        <a href="{{ url('pelanggan/create') }}" data-bs-toggle="modal" data-bs-target="#exampleModal"
            class="mb-3 btn btn-primary"><i class="fa-solid fa-user-plus"></i> Add
            Pelanggan</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#No</th>
                    <th>Nama Pelanggan</th>
                    <th>No Hp Pelanggan</th>
                    <th>Alamat Pelanggan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->nama_pelanggan }}</td>
                        <td>{{ $row->nohp_pelanggan }}</td>
                        <td>{{ $row->alamat_pelanggan }}</td>
                        <td>
                            <a href="#edit{{ $row->id }}" class="btn btn-warning" data-bs-toggle="modal"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{ url('pelanggan/delete/' . $row->id) }}" class="btn btn-danger"><i
                                    class="fa-solid fa-trash" onclick="return confirm('Are you sure?')"></i></a>
                        </td>
                        @include('pelanggan.edit')
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
