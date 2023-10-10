<div class="modal fade" id="tambahPengeluaranModal" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form id="tambahPengeluaranForm" action="{{ route('pengeluaran.store') }}" method="POST" class="form-horizontal">
            @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Tambah Pengeluaran</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                      
                            <div class="form-group row">
                                <label for="tanggal" class="col-lg-2 col-lg-offset-1 control-label">Tanggal</label>
                                <div class="col-lg-6">
                                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                            <label for="deskripsi" class="col-lg-2 col-lg-offset-1 control-label">Deskripsi</label>
                            <div class="col-lg-6">
                                <input type="text" name="deskripsi" id="deskripsi" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nominal" class="col-lg-2 col-lg-offset-1 control-label">Nominal</label>
                            <div class="col-lg-6">
                                <input type="number" name="nominal" id="nominal" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-flat btn-primary addPengeluaran"><i
                                class="fa fa-save"></i> Simpan</button>
                        <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i
                                class="fa fa-arrow-circle-left"></i> Batal</button>
                    </div>
                    <div id="pesan" class="alert alert-success" style="display: none;"></div>
                </div>
        </form>
    </div>
</div>
