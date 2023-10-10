<!-- Modal tambah member -->
<div class="modal fade" id="tambahMemberModal" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form id="tambahMemberForm" action="{{ route('member.store') }}" method="POST" class="form-horizontal">
            @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Tambah Member</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="kode_member" class="col-lg-2 col-lg-offset-1 control-label">Kode Member</label>
                        <div class="col-lg-6">
                            <input type="text" name="kode_member" id="kode_member" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-lg-2 col-lg-offset-1 control-label">Nama</label>
                        <div class="col-lg-6">
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-lg-2 col-lg-offset-1 control-label">Alamat</label>
                        <div class="col-lg-6">
                            <input type="text" name="alamat" id="alamat" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telepon" class="col-lg-2 col-lg-offset-1 control-label">Telepon</label>
                        <div class="col-lg-6">
                            <input type="text" name="telepon" id="telepon" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-flat btn-primary addMember"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
                <div id="pesan" class="alert alert-success" style="display: none;"></div>
            </div>
        </form>
    </div>
</div>
