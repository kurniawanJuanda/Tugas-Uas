<form action="{{ url('pelanggan/edit/' . $row->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <div class="modal fade" id="edit{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pelanggan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pelanggan <sup
                                class="text-danger fw-bold">*</sup></label>
                        <input type="text" class="form-control" id="nama" aria-describedby="namaHelp"
                            name="nama_pelanggan" value="{{ $row->nama_pelanggan }}">
                    </div>
                    <div class="mb-3">
                        <label for="nohp" class="form-label">No Hp Pelanggan <sup
                                class="text-danger fw-bold">*</sup></label>
                        <input type="text" class="form-control" id="nohp" aria-describedby="namaHelp"
                            name="nohp_pelanggan" value="{{ $row->nohp_pelanggan }}">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Pelanggan <sup
                                class="text-danger fw-bold">*</sup></label>
                        <input type="text" class="form-control" id="alamat" aria-describedby="namaHelp"
                            name="alamat_pelanggan" value="{{ $row->alamat_pelanggan }}">
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
