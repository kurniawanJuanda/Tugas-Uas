@extends('layouts.app')

@section('content')
    {{-- Tambah Data Modal --}}
    <form action="{{ url('layanan/store') }}" method="POST">
        {{ csrf_field() }}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Layanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="jenisLayanan" class="form-label">Jenis Layanan</label>
                            <input type="text" class="form-control" name="jenis_layanan" id="jenisLayanan">
                        </div>
                        <div class="mb-3">
                            <label for="biayaLayanan" class="form-label">Biaya Layanan</label>
                            <input type="number" class="form-control" name="biaya_layanan" id="biayaLayanan"
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
        <h1>Data Layanan</h1>
        <hr>
        <a href="{{ url('layanan/create') }}" data-bs-toggle="modal" data-bs-target="#exampleModal"
            class="mb-3 btn btn-primary"><i class="fa-solid fa-user-plus"></i> Add
            Layanan</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#No</th>
                    <th>Jenis Layanan</th>
                    <th>Harga Layanan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->jenis_layanan }}</td>
                        <td>{{ 'Rp ' . number_format($row->biaya_layanan) . ' / Kg' }}</td>
                        <td>
                            <a href="#edit{{ $row->id }}" class="btn btn-warning" data-bs-toggle="modal"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{ url('layanan/delete/' . $row->id) }}" class="btn btn-danger"><i
                                    class="fa-solid fa-trash" onclick="return confirm('Are you sure?')"></i></a>
                        </td>
                        @include('layanan.edit')
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
