<form action="/karyawan" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="createkaryawan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Karyawan</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(Auth()->user()->jabatan_id == 'HRGA' && Auth()->user()->posisi_id == 'Staff')
                    <div class="mb-3">
                        <label class="col-sm-12 col-form-label">No. Induk Karyawan</label>
                        <div class="col-md-12">
                            <select class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip"
                                required>
                                <option>-- Pilih No. Induk Karyawan --</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->induk }}">{{ $user->induk }}</option>
                                @endforeach
                            </select>
                            @error('nip')
                            <div class="invalid-feedback">
                                {{ 'Jika Nomor Nip salah angka terakhir ditambah 1' }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="col-sm-12 col-form-label">Nama Karyawan</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control @error('name') is-invalid @enderror text-capitalize"
                                id="name" name="name" placeholder="Nama Karyawan" required value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="col-sm-12 col-form-label">Jabatan Karyawan</label>
                        <div class="col-md-12">
                            <select class="form-select" name="jabatan">
                                <option value="" selected disabled>-- Pilih Jabatan --</option>
                                @foreach ($jabatans as $jabatan)
                                @if (old('jabatan') == $jabatan->name)
                                <option value="{{ $jabatan->name }}" selected>{{ $jabatan->name }}</option>
                                @else
                                <option value="{{ $jabatan->name }}">{{ $jabatan->name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                               <div class="mb-3">
                        <label for="password" class="form-label text-dark">Posisi Karyawan</label></label>
                        <div class="col-sm-12">
                            <select class="form-select text-capitalize" name="posisi">
                                <option value="" selected disabled>-- Pilih Posisi --</option>
                                @foreach ($posisis->unique('nama') as $pos)
                                <option value="{{ $pos->nama }}" {{ old('posisi')==$pos->nama ? 'selected' : '' }}>
                                    {{ $pos->nama }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    @else
                    <div class="mb-3">
                        <label class="col-sm-12 col-form-label">No Induk Karyawan</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control bg-white @error('nip') is-invalid @enderror" id="nip"
                                name="nip" placeholder="No Induk Pegawai" required value="{{ Auth()->user()->induk }}"
                                readonly>
                            @error('nip')
                            <div class="invalid-feedback">
                                {{ 'Jika Nomor Nip salah angka terakhir ditambah 1' }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="col-sm-12 col-form-label">Nama Karyawan</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control bg-white @error('name') is-invalid @enderror"
                                id="name" name="name" placeholder="Nama Karyawan" required
                                value="{{ Auth()->user()->name }}" readonly>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="col-sm-12 col-form-label">Jabatan Karyawan</label>
                        <div class="col-md-12">
                            <input type="text"
                                class="form-control bg-white @error('jabatan') is-invalid @enderror text-capitalize"
                                id="jabatan" name="jabatan" placeholder="Jabatan" required
                                value="{{ Auth()->user()->jabatan_id }}" readonly>
                            @error('jabatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="col-sm-12 col-form-label">Posisi Karyawan</label>
                        <div class="col-md-12">
                            <input type="text"
                                class="form-control bg-white @error('posisi') is-invalid @enderror text-capitalize"
                                id="posisi" name="posisi" placeholder="posisi" required
                                value="{{ Auth()->user()->posisi_id }}" readonly>
                            @error('posisi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    @endif

                    <div class="mb-3">
                        <label class="col-sm-12 col-form-label">No. KTP</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control @error('idcard') is-invalid @enderror" id="idcard"
                                name="idcard" placeholder="No. KTP" required value="{{ old('idcard') }}" minlength="16"
                                maxlength="16" min="1" max="16">
                            @error('idcard')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="col-sm-12 col-form-label">Tempat Lahir</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control @error('tempat') is-invalid @enderror" id="tempat"
                                name="tempat" placeholder="Tempat Lahir" required value="{{ old('tempat') }}">
                            @error('tempat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="col-sm-12 col-form-label">Tanggal Lahir</label>
                        <div class="col-md-12">
                            <input type="date" class="form-control @error('tgllahir') is-invalid @enderror"
                                id="tgllahir" name="tgllahir" value="{{ old('tgllahir') }}" required>
                            @error('tgllahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="col-sm-12 col-form-label">Agama</label>
                        <div class="col-md-12">
                            <select class="form-select" name="agama" id="agama" required>
                                <option value="" disabled selected>-- Pilih Agama--</option>
                                <option value="Islam" {{ old('agama')=='Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('agama')=='Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Budha" {{ old('agama')=='Budha' ? 'selected' : '' }}>Budha</option>
                                <option value="Hindu" {{ old('agama')=='Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Konghucu" {{ old('agama')=='Konghucu' ? 'selected' : '' }}>Konghucu
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="col-sm-12 col-form-label">Jenis Kelamin </label>
                        <div class="col-md-12">
                            <select class="form-select" name="jenkel" id="jenkel" required>
                                <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki" {{ old('jenkel')=='Laki-laki' ? 'selected' : '' }}>Laki-laki
                                </option>
                                <option value="Perempuan" {{ old('jenkel')=='Perempuan' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="col-sm-12 col-form-label">Pendidikan</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control @error('pendidikan') is-invalid @enderror"
                                id="pendidikan" name="pendidikan" placeholder="Pendidikan"
                                value="{{ old('pendidikan') }}" required>
                            @error('pendidikan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="col-sm-12 col-form-label">Tahun Lulus</label>
                        <div class="col-md-12">
                            <input type="date" class="form-control @error('lulus') is-invalid @enderror" id="lulus"
                                name="lulus" placeholder="Id Card" value="{{ old('lulus') }}" required>
                            @error('lulus')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="col-sm-12 col-form-label">Status Pernikahan</label>
                        <div class="col-md-12">
                            <select class="form-select" name="status" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Belum Menikah" {{ old('status')=='Belum Menikah' ? 'selected' : '' }}>
                                    Belum Menikah</option>
                                <option value="Menikah" {{ old('status')=='Menikah' ? 'selected' : '' }}>Menikah
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="col-sm-12 col-form-label">Alamat</label>
                        <div class="col-md-12">
                            <input type="text"
                                class="form-control @error('alamat') is-invalid @enderror text-capitalize" id="alamat"
                                name="alamat" placeholder="Alamat" required value="{{ old('alamat') }}">
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="col-sm-12 col-form-label">No. Handphone</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control @error('nohp') is-invalid @enderror" id="nohp"
                                name="nohp" placeholder="No Handphone" required value="{{ old('nohp') }}">
                            @error('nohp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <img class="img-preview img-fluid col-md-12 mt-2" src="/default.png" class="img-thumbnail"
                            style="width: 210px">
                        <label class="col-sm-12 col-form-label">Foto Karyawan</label>
                        <div class="col-sm-12">
                            <input type="file"
                                class="form-control @error('slug') is-invalid @enderror @error('image') is-invalid @enderror"
                                id="image" name="image" onchange="previewImage()">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
