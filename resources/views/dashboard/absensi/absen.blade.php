<form action="{{ route('absensi.store') }}" method="POST">
    <div class="modal fade" id="AbsenModal" tabindex="-1" aria-labelledby="AbsenModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AbsenModalLabel">Absensi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="karyawan_id">Karyawan ID</label>
                        <input type="text" class="form-control bg-white" readonly id="karyawan_id" name="karyawan_id"
                            value="{{ auth()->user()->induk }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="karyawan_id">Nama Lengkap</label>
                        <input type="text" class="form-control bg-white" readonly value="{{ auth()->user()->name }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="karyawan_id">Jabatan</label>
                        <input type="text" class="form-control text-capitalize bg-white" readonly
                            value="{{ auth()->user()->posisi_id }} - {{ auth()->user()->jabatan_id }}">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="tanggal">Tanggal</label>
                                <input type="text" class="form-control bg-white" value="{{ \Carbon\Carbon::now()->timezone('Asia/Jakarta')->formatLocalized('%d %B %Y')
                        }}" readonly>
                                <input type="datetime" id="tanggal" class="form-control" name="tanggal"
                                    value="{{ \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s') }}" hidden>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="waktu">Waktu</label>
                                <input type="time" class="form-control bg-white" readonly
                                    value="{{ \Carbon\Carbon::now()->timezone('Asia/Jakarta')->format('H:i') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="status" name="status" value="Hadir" hidden>
                        <input type="text" class="form-control" id="latitude" name="latitude" hidden>
                        <input type="text" class="form-control" id="longitude" name="longitude" hidden>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="closeCamera()" data-bs-dismiss="modal"
                        aria-label="Close">Batal</button>
                    <button type="submit" class="btn btn-primary">Absen</button>
                </div>
            </div>
        </div>
    </div>
</form>
