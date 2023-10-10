<div class="modal fade" id="editPengeluaranModal" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form id="editPengeluaranForm" method="POST">
            @csrf
            @method('PUT')

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Edit Pengeluaran</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="edit_tanggal" class="col-lg-2 col-lg-offset-1 control-label">Tanggal</label>
                        <div class="col-lg-6">
                            <input type="date" name="tanggal" id="edit_tanggal" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_deskripsi" class="col-lg-2 col-lg-offset-1 control-label">Deskripsi</label>
                        <div class="col-lg-6">
                            <input type="text" name="deskripsi" id="edit_deskripsi" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_nominal" class="col-lg-2 col-lg-offset-1 control-label">Nominal</label>
                        <div class="col-lg-6">
                            <input type="number" name="nominal" id="edit_nominal" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>


