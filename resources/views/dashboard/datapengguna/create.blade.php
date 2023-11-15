<form method="post" action="/datapengguna" class="mb-3" enctype="multipart/form-data" id="createsuratmasuk">
    @csrf
    <div class="modal fade" id="penggunacreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pengguna</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="induk" class="form-label text-dark">Nomor Induk Karyawan</label>
                        <input type="text" class="form-control @error('induk') is-invalid @enderror" id="induk"
                            name="induk" value="{{ $kode }}" placeholder="Nomor Induk Karyawan" min="1" maxlength="10">
                        @error('induk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label text-dark">Nama Lengkap</label>
                        <input type="text" class="form-control text-capitalize" id="name" name="name" required autofocus
                            value="{{ old('name') }}" placeholder="Nama Lengkap">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label text-dark">Jabatan</label></label>
                            <select class="form-select text-capitalize" name="jabatan_id">
                                <option value="" selected disabled>-- Pilih Jabatan --</option>
                                @foreach ($jabatan as $jabatan)
                                @if (old('jabatan_id') == $jabatan->name)
                                <option value="{{ $jabatan->name }}" selected>{{ $jabatan->name }}</option>
                                @else
                                <option value="{{ $jabatan->name }}">{{ $jabatan->name }}</option>
                                @endif
                                @endforeach
                            </select>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label text-dark">Posisi</label></label>
                        <select class="form-select text-capitalize" name="posisi_id">
                            <option value="" selected disabled>-- Pilih Posisi --</option>
                            @foreach ($posisi->unique('nama') as $pos)
                            <option value="{{ $pos->nama }}" {{ old('posisi_id')==$pos->nama ? 'selected' : '' }}>
                                {{ $pos->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label text-dark">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required autofocus value="12345" placeholder="Password">
                            <button type="button" class="btn btn-outline-primary" id="togglePassword">
                                <i class="bi bi-eye" id="passwordIcon"></i>
                            </button>
                        </div>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    const passwordInput = document.getElementById('password');
    const passwordIcon = document.getElementById('passwordIcon');
    const togglePasswordButton = document.getElementById('togglePassword');

    togglePasswordButton.addEventListener('click', function () {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordIcon.classList.remove('bi-eye');
            passwordIcon.classList.add('bi-eye-slash');
        } else {
            passwordInput.type = 'password';
            passwordIcon.classList.remove('bi-eye-slash');
            passwordIcon.classList.add('bi-eye');
        }
    });
</script>
