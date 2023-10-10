<div class="modal fade" id="editKategoriModal" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form id="editKategoriForm" method="POST">
            @csrf
            @method('PUT')

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Edit Kategori</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="edit_nama_kategori" class="col-lg-2 col-lg-offset-1 control-label">Kategori</label>
                        <div class="col-lg-6">
                            <input type="text" name="nama" id="edit_nama_kategori" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                    
                </div>
                
                <div id="pesanEdit" class="alert alert-success" style="display: none;"></div>
            </div>
        </form>
    </div>
</div>

{{-- 
<script>
$(document).ready(function () {
        // Menampilkan modal edit ketika tombol Edit diklik
        $('.edit-kategori').on('click', function () {
            var idKategori      = $(this).data('id');
            var namaKategori    = $(this).data('nama');
            
            // Mengatur nilai formulir edit
            $('#editKategoriForm').attr('action', '/kategori/' + idKategori);
            $('#edit_nama_kategori').val(namaKategori);

            // Menampilkan modal edit
            $('#editKategoriModal').modal('show');
        });


        // Mengirim Permintaan ajax saat formulir edit disubmit
        $('#editKategoriForm').submit(function (e) {
            e.preventDefault(); // Menghentikan perilaku default form
            
            // Mengambil data dari formulir
            var formData = $(this).serialize();
            var url = $(this).attr('action'); // URL untuk mengirim permintaan
            console.log(url)
            // Menggunakan AJAX untuk mengirim data
            $.ajax({
                type: 'POST', // Ganti dengan 'PUT' jika diperlukan
                url: url,
                data: 
                    formData,
                    // "_method" : "PUT",
                    // "_token" : "{{ csrf_token() }}"
                    
                
            
                success: function (response) {
                    console.log('Data berhasil disimpan:', response);
                    $('#editKategoriModal').modal('hide');
                    location.reload();
                    $('#pesanEdit').text('Kategori berhasil diperbarui.').addClass('alert-success').show();
                },
                error: function (error) {
                    alert('Terjadi kesalahan saat mengupdate kategori.');
                }
            });
        });
    });
</script> --}}
