<div class="modal fade" id="posisicreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Posisi Jabatan</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/posisi" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Nama Jabatan</label>
                        <select class="form-select" name="jabatan_id">
                            <option value="" selected disabled>-- Pilih --</option>
                            @foreach ($jabatans as $jabatan)
                            @if (old('jabatan_id') == $jabatan->id)
                            <option value="{{ $jabatan->id }}" selected>{{ $jabatan->name }}</option>
                            @else
                            <option value="{{ $jabatan->id }}">{{ $jabatan->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Nama Posisi</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" placeholder="Nama Posisi" required value="{{ old('nama') }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
