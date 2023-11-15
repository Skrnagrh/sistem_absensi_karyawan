<div class="modal fade" id="showKaryawan{{ $karyawan->nip }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fs-5" id="exampleModalLabel">Detail Data Karyawan</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row my">

                    <div class="col-md-8">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Data {{ $karyawan->name }}</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table">
                                    <tbody class="text-capitalize">
                                        <tr>
                                            <td style="width: 150px">
                                                <b>No. Induk Pegawai</b>
                                            </td>
                                            <td>:</td>
                                            <td>{{ $karyawan->nip }} </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 150px">
                                                <b>No. KTP</b>
                                            </td>
                                            <td>:</td>
                                            <td>{{ $karyawan->idcard }} </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 150px">
                                                <b>Nama Lengkap</b>
                                            </td>
                                            <td>:</td>
                                            <td>{{ $karyawan->name }} </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 150px">
                                                <b>Tanggal Lahir</b>
                                            </td>
                                            <td>:</td>
                                            <td>{{ $karyawan->tempat }}, {{ $karyawan->tgllahir }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 150px">
                                                <b>Jenis Kelamin</b>
                                            </td>
                                            <td>:</td>
                                            <td>{{ $karyawan->jenkel }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 150px">
                                                <b>Agama</b>
                                            </td>
                                            <td>:</td>
                                            <td>{{ $karyawan->agama }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 150px">
                                                <b>Alamat Lengkap</b>
                                            </td>
                                            <td>:</td>
                                            <td>{{ $karyawan->alamat }} </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 150px">
                                                <b>Nomor Hp</b>
                                            </td>
                                            <td>:</td>
                                            <td>{{ $karyawan->nohp }} </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 150px">
                                                <b>Pendidikan</b>
                                            </td>
                                            <td>:</td>
                                            <td>{{ $karyawan->pendidikan }} Tahun Lulus {{ $karyawan->lulus
                                                }}</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 150px">
                                                <b>Status Pernikahan</b>
                                            </td>
                                            <td>:</td>
                                            <td>{{ $karyawan->status }} </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 150px">
                                                <b>Jabatan Karyawan</b>
                                            </td>
                                            <td>:</td>
                                            <td>{{ $karyawan->posisi }} - {{ $karyawan->jabatan }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-success">
                            <div class="card-header">
                                <center>
                                    <h3 class="card-title">
                                        Foto Karyawan
                                    </h3>
                                </center>
                            </div>
                            <div class="card-body text-center">
                                <div class="text-center">
                                    @if ($karyawan->image)
                                    <img src="{{ 'storage/' . $karyawan->image }}" class="img-thumbnail"
                                        style="width: 250px">
                                    @else
                                    <img src="/asset/img/male.jpg" class="img-thumbnail" style="width: 210px">
                                    @endif
                                </div>
                                <h6 class="profile-username text-center mt-3 text-capitalize">
                                    {{ $karyawan->nip }}
                                </h6>
                                <h6 class="profile-username text-center text-capitalize">
                                    {{ $karyawan->name }}
                                </h6>

                                @if (Auth::user()->jabatan_id == 'staff')
                                <a href="https://wa.me/{{ $karyawan->nohp }}" target="_blank"
                                    class="btn btn-success mt-3">
                                    <i class="bi bi-whatsapp"></i> Whatsapp</a>
                                <a href="tel:{{ $karyawan->nohp }}" class="btn btn-primary mt-3">
                                    <i class="fas fa-phone"></i> Telephone</a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-danger text-white" data-bs-dismiss="modal" aria-label="Close">Batal</a>
                <a href="/karyawan/{{ $karyawan->nip }}" class="btn btn-secondary"
                    data-bs-toggle="modal" data-bs-target="#print{{ $karyawan->nip }}">
                    Print
                </a>
            </div>
        </div>
    </div>
</div>
