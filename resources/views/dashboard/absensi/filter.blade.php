<form action="{{ route('absensi.index') }}" method="GET">
    <div class="modal fade" id="FilterModal" tabindex="-1" aria-labelledby="FilterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="FilterModalLabel">Select Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="start_date" class="col-form-label">Mulai Tanggal</label>
                            <input type="date" name="start_date" id="start_date" class="form-control"
                                value="{{ request('start_date') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="end_date" class="col-form-label">Akhir Tanggal</label>
                            <input type="date" name="end_date" id="end_date" class="form-control"
                                value="{{ request('end_date') }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="resetDates1" data-bs-dismiss="modal"
                        aria-label="Close">Batal</button>
                    <button type="submit" class="btn btn-primary">Select</button>
                </div>
            </div>
        </div>
    </div>
</form>