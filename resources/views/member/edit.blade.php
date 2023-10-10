<!-- Modal edit member -->
<div class="modal fade" id="editMemberModal" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form id="editMemberForm" method="POST">
            @csrf
            @method('PUT')

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Edit Member</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="edit_kode_member" class="col-lg-2 col-lg-offset-1 control-label">Kode Member</label>
                        <div class="col-lg-6">
                            <input type="text" name="kode_member" id="edit_kode_member" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_nama" class="col-lg-2 col-lg-offset-1 control-label">Nama</label>
                        <div class="col-lg-6">
                            <input type="text" name="nama" id="edit_nama" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_alamat" class="col-lg-2 col-lg-offset-1 control-label">Alamat</label>
                        <div class="col-lg-6">
                            <input type="text" name="alamat" id="edit_alamat" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="edit_telepon" class="col-lg-2 col-lg-offset-1 control-label">Telepon</label>
                        <div class="col-lg-6">
                            <input type="text" name="telepon" id="edit_telepon" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i
                            class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
                <div id="pesanEdit" class="alert alert-success" style="display: none;"></div>
            </div>
        </form>
    </div>
</div>

{{-- <script>
    $(document).ready(function() {
        //Menampilkan modal edit ketika tombol edit diklik
        $('.edit-member').on('click', function() {
            var idMember = $(this).data('id');
            var kodeMember = $(this).data('kode_member');
            var namaMember = $(this).data('nama');
            var alamatMember = $(this).data('alamat');
            var teleponMember = $(this).data('telepon');

            //Mengatur  nilai formulir edit
            $('#editMemberForm').attr('action', '/member/' + idMember);
            $('#edit_kode_member').val(kodeMember);
            $('#edit_nama').val(namaMember);
            $('#edit_alamat').val(alamatMember);
            $('#edit_telepon').val(teleponMember);


            //Menampilkan modal edit
            $('#editMemberModal').modal('show');

        });

        //mengirim permintaan ajax saat formulir disubmit
        $('#editMemberForm').submit(function(e) {
            e.preventDefault();

            //mengambil data dari formulir
            var formData = $(this).serialize();
            var url = $(this).attr('action');
            console.log(url);
            //menggunakan ajax untuk mengirimkan data
            $.ajax({
                type: "POST",
                url: url,
                data: formData,

                success: function(response) {
                    console.log('Data berhasil disimpan:', response);
                    $('#editMemberModal').modal('hide');
                    location.reload();
                    $('#pesanEdit').text('Member berhasil diperbarui').addClass(
                        'alert-succes').show();
                },
                error: function(error) {
                    alert('Terjadi kesalahan saat mengupdate member.');

                }


            });

        });

    });
</script> --}}
