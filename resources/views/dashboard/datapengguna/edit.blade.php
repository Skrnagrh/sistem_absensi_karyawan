<form method="post" action="{{ route('datapengguna.update', $user->id) }}" id="editdatapetugas"
    enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="modal fade" id="penggunaedit{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Pengguna</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="induk" class="form-label">No Induk Pegawai</label>
                        <input type="number" class="form-control" id="induk" name="induk" required autofocus
                            value="{{ old('induk', $user->induk) }}">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control text-capitalize" id="name" name="name" required
                            value="{{ old('name', $user->name) }}" placeholder="Nama Lengkap">
                    </div>

                    <div class="mb-3">
                        <label for="jabatan_id" class="label text-dark">Jabatan</label>
                        <select class="form-select text-capitalize" name="jabatan">
                            @foreach ($jabatan as $jabatan)
                            @if (old('jabatan_id', $user->jabatan_id) == $jabatan->name)
                            <option value="{{ $jabatan->name }}" selected>{{ $jabatan->name }}</option>
                            @else
                            <option value="{{ $jabatan->name }}">{{ $jabatan->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="posisi_id" class="label text-dark">Posisi</label>
                        <select class="form-select text-capitalize" name="posisi_id">
                            @foreach ($posisi as $posisi)
                            @if (old('posisi_id', $user->posisi_id) == $posisi->nama)
                            <option value="{{ $posisi->nama }}" selected>{{ $posisi->nama }}</option>
                            @else
                            <option value="{{ $posisi->nama }}">{{ $posisi->nama }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                        aria-label="Close">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>