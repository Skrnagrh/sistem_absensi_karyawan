<form action="/karyawan/{{ $karyawan->nip }}" method="post" enctype="multipart/form-data">

    @method('put')
    @csrf
    <div class="modal fade" id="editKaryawan{{ $karyawan->nip }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Karyawan</h6>
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
                                    @if (old('nip', $karyawan->nip) == $user->induk)
                                    <option value="{{ $user->induk }}" selected>{{ $user->induk }}</option>
                                    @else
                                    <option value="{{ $user->induk }}">{{ $user->induk }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="col-md-12 col-form-label">Nama Karyawan</label>
                            <div class="col-md-12">
                                <input type="text"
                                    class="form-control @error('name') is-invalid @enderror text-capitalize" id="name"
                                    name="name" placeholder="Nama Karyawan" required
                                    value="{{ old('name', $karyawan->name) }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="col-md-12 col-form-label">Jabatan Karyawan</label>
                            <div class="col-md-12">
                                <select class="form-select" name="jabatan">
                                    <option disabled>-- Pilih Jabatan --</option>
                                    @foreach ($jabatans as $jabatan)
                                    @if (old('jabatan', $karyawan->jabatan) == $jabatan->name)
                                    <option value="{{ $jabatan->name }}" selected>{{ $jabatan->name }}
                                    </option>
                                    @else
                                    <option value="{{ $jabatan->name }}">{{ $jabatan->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="col-md-12 col-form-label">Posisi Karyawan</label>
                            <div class="col-md-12">
                                <select class="form-select" name="posisi">
                                    <option disabled>-- Pilih Posisi --</option>
                                    @foreach ($posisis->unique('nama') as $posisi)
                                    @if (old('posisi', $karyawan->posisi) == $posisi->nama)
                                    <option value="{{ $posisi->nama }}" selected>{{ $posisi->nama }}
                                    </option>
                                    @else
                                    <option value="{{ $posisi->nama }}">{{ $posisi->nama }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @else
                        <div class="mb-3">
                            <label class="col-md-12 col-form-label">No Induk Karyawan</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip"
                                    name="nip" placeholder="NIP" required value="{{ Auth()->user()->induk }}" readonly>
                                @error('nip')
                                <div class="invalid-feedback">
                                    {{ 'Jika Nomor Nip salah angka terakhir ditambah 1' }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="col-md-12 col-form-label">Nama Karyawan</label>
                            <div class="col-md-12">
                                <input type="text"
                                    class="form-control @error('name') is-invalid @enderror text-capitalize" id="name"
                                    name="name" placeholder="Nama Karyawan" required value="{{ Auth()->user()->name }}"
                                    readonly>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="col-md-12 col-form-label">Jabatan Karyawan</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                    id="jabatan" name="jabatan" placeholder="Jabatan" required
                                    value="{{ old('jabatan', $karyawan->jabatan) }}" readonly>
                                @error('jabatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="col-md-12 col-form-label">Posisi Karyawan</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control @error('posisi') is-invalid @enderror"
                                    id="posisi" name="posisi" placeholder="posisi" required
                                    value="{{ old('posisi', $karyawan->posisi) }}" readonly>
                                @error('posisi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        @endif

                        <div class="mb-3">
                            <label class="col-md-12 col-form-label">No. KTP</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="idcard" name="idcard" placeholder="No. KTP"
                                    required value="{{ old('idcard', $karyawan->idcard) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="col-sm-12 col-form-label">Tempat Lahir</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control @error('tempat') is-invalid @enderror"
                                    id="tempat" name="tempat" placeholder="Tempat Lahir" required
                                    value="{{ old('tempat', $karyawan->tempat) }}">
                                @error('tempat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="col-md-12 col-form-label">Tanggal Lahir</label>
                            <div class="col-md-12">
                                <input type="date" class="form-control @error('tgllahir') is-invalid @enderror"
                                    id="tgllahir" name="tgllahir" value="{{ old('tgllahir', $karyawan->tgllahir) }}">
                                @error('tgllahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="name" class="col-md-12 col-form-label">Agama</label>
                            <div class="col-md-12">
                                <select class="form-select" name="agama" id="agama"
                                    aria-valuetext="{{ old('agama', $karyawan->agama) }}">
                                    <option disabled>-- Pilih Agama --</option>
                                    <option value="Islam" {{ $karyawan->agama == 'Islam' ? 'selected' : '' }}>Islam
                                    </option>
                                    <option value="Kristen" {{ $karyawan->agama == 'Kristen' ? 'selected' : ''
                                        }}>Kristen</option>
                                    <option value="Budha" {{ $karyawan->agama == 'Budha' ? 'selected' : '' }}>Budha
                                    </option>
                                    <option value="Hindu" {{ $karyawan->agama == 'Hindu' ? 'selected' : '' }}>Hindu
                                    </option>
                                    <option value="Konghucu" {{ $karyawan->agama == 'Konghucu' ? 'selected' : ''
                                        }}>Konghucu</option>
                                </select>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="name" class="col-md-12 col-form-label">Jenis Kelamin</label>
                            <div class="col-md-12">
                                <select class="form-select" name="jenkel" id="jenkel"
                                    value="{{ old('jenkel', $karyawan->jenkel) }}">
                                    <option disabled>-- Pilih Jenis Kelamin --</option>
                                    @if (old('jenkel', $karyawan->jenkel) == old('jenkel', $karyawan->jenkel))
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    @else
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    @endif

                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="col-md-12 col-form-label">Pendidikan</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control @error('pendidikan') is-invalid @enderror"
                                    id="pendidikan" name="pendidikan" placeholder="Id Card"
                                    value="{{ old('pendidikan', $karyawan->pendidikan) }}">
                                @error('pendidikan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="col-md-12 col-form-label">Tahun Lulus</label>
                            <div class="col-md-12">
                                <input type="date" class="form-control @error('lulus') is-invalid @enderror" id="lulus"
                                    name="lulus" placeholder="Id Card" value="{{ old('lulus', $karyawan->lulus) }}">
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
                                    <option value="" selected disabled>-- Pilih Pernikahan --</option>
                                    <option value="Belum Menikah" {{ $karyawan->status == 'Belum Menikah' ? 'selected' :
                                        '' }}>Belum Menikah</option>
                                    <option value="Menikah" {{ $karyawan->status == 'Menikah' ? 'selected' : ''
                                        }}>Menikah</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="col-md-12 col-form-label">Alamat</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat"
                                    required value="{{ old('alamat', $karyawan->alamat) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="col-sm-12 col-form-label">No. Handphone</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control @error('nohp') is-invalid @enderror" id="nohp"
                                    name="nohp" placeholder="No Handphone" required
                                    value="{{ old('nohp', $karyawan->nohp) }}">
                                @error('nohp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            @if ($karyawan->image)
                            <img src="{{ asset('storage/' . $karyawan->image) }}"
                                class="edit-img-preview img-fluid mb-3 col-md-12 d-block mt-3" style="width: 50%">
                            @else
                            <img class="edit-img-preview img-fluid mb-3 col-md-12 mt-3" src="/default.png"
                                style="width: 50%">
                            @endif
                            <div class="col-sm-12">
                                <label class="col-md-12 col-form-label">Foto Karyawan</label>
                                <input type="hidden" name="oldImage" value="{{ $karyawan->image }}">
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="edit-image" name="image" onchange="previewImageEdit()">
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <p class="help-block">
                                    <font color="red">"Format file Jpg/Png"</font>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a type="button" class="btn btn-danger text-white" data-bs-dismiss="modal"
                            aria-label="Close">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </div>
            </div>
        </div>
</form>

<script>
    function previewImageEdit() {
        const image = document.querySelector('#edit-image');
        const imgPreview = document.querySelector('.edit-img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
