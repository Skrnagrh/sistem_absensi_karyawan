<div class="modal fade" id="editposisi{{ $posisi->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Posisi Jabatan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/posisi/{{ $posisi->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Nama Jabatan</label>
                        <select class="form-select" name="jabatan_id">
                            <option value="" selected disabled>-- Pilih Jabatan --</option>
                            @foreach ($jabatans as $jabatan)
                            <option value="{{ $jabatan->id }}" {{ (old('jabatan_id', $posisi->jabatan_id) ==
                                $jabatan->id) ? 'selected' : '' }}>
                                {{ $jabatan->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Nama Posisi</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror text-capitalize"
                            id="nama" name="nama" placeholder="Nama Posisi" required
                            value="{{ old('nama', $posisi->nama) }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-danger text-white" data-bs-dismiss="modal" aria-label="Close">
                        Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>