@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">
                <h1>Transaksi</h1>
            </div>
            <div class="card-body">
                <form action="{{ url('transaksi/store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="namaPelanggan" class="form-label fw-bold">Nama Pelanggan</label>
                            <select name="nama_pelanggan" id="namaPelanggan" class="form-select">
                                @foreach ($dtPelanggan as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama_pelanggan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="jenisLayanan" class="form-label fw-bold">Jenis Layanan</label>
                            <select name="jenis_layanan" id="jenisLayanan" class="form-select">
                                @foreach ($dtLayanan as $row)
                                    <option value="{{ $row->id }}">
                                        {{ $row->jenis_layanan }}
                                        ({{ ' Rp. ' . number_format($row->biaya_layanan) . ' / Kg ' }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="berat" class="form-label fw-bold">Berat ( Kg )</label>
                            <input type="number" class="form-control" name="berat" min="1">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="berat" class="form-label fw-bold">Tanggal Selesai</label>
                            <input type="date" class="form-control" name="tgl_selesai">
                        </div>
                        <div class="mb-3 col-md-6">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card my-3">
            <div class="card-header">
                <h3>Data Transaksi</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#No</th>
                            <th>Nama Pelanggan</th>
                            <th>Jenis Layanan</th>
                            <th>Berat</th>
                            <th>Total Harga</th>
                            <th>Tanggal Order</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->pelanggan['nama_pelanggan'] }}</td>
                                <td>{{ $row->layanan['jenis_layanan'] }}</td>
                                <td>{{ $row->berat . ' / Kg' }}</td>
                                <td>{{ 'Rp. ' . number_format($row->total_harga) }}</td>
                                <td>{{ $row->waktu }}</td>
                                <td>{{ $row->tgl_selesai }}</td>
                                @if ($row->status == 'Selesai')
                                    <td><span class="badge bg-success">{{ $row->status }}</span></td>
                                @else
                                    <td><span class="badge bg-warning">{{ $row->status }}</span></td>
                                @endif
                                <td>
                                    <a href="#edit{{ $row->id }}" class="btn btn-warning" data-bs-toggle="modal"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ url('transaksi/delete/' . $row->id) }}" class="btn btn-danger"><i
                                            class="fa-solid fa-trash"></i></a>
                                </td>
                                @include('transaksi.edit')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
