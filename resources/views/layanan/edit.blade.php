<form action="{{ url('layanan/edit/' . $row->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <div class="modal fade" id="edit{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Layanan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Layanan <sup
                                class="text-danger fw-bold">*</sup></label>
                        <input type="text" class="form-control" id="nama" aria-describedby="namaHelp"
                            name="jenis_layanan" value="{{ $row->jenis_layanan }}">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Biaya Layanan <sup
                                class="text-danger fw-bold">*</sup></label>
                        <input type="text" class="form-control" id="nama" aria-describedby="namaHelp"
                            name="biaya_layanan" value="{{ $row->biaya_layanan }}">
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
