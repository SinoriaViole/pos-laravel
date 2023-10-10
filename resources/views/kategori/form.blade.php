<div class="modal fade" id="tambahKategoriModal" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form id="tambahkategoriform" action="{{ route('kategori.store') }}" method="POST" class="form-horizontal">
            @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Tambah Kategori</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nama_kategori" class="col-lg-2 col-lg-offset-1 control-label">Kategori</label>
                        <div class="col-lg-6">
                            <input type="text" name="nama" id="nama_kategori" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-flat btn-primary addCategory"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
                <div id="pesan" class="alert alert-success" style="display: none;"></div>
            </div>
        </form>
    </div>
</div>
<!-- Tambahkan kode ini di bagian <script> setelah memuat jQuery -->
<script>
    // $(".addCategory").click(function(){

    //     var form    = $("#tambahkategoriform");
    //     var url     = form.attr("action") 
    //     $.ajax({
    //         url     : url ,
    //         method  : "POST",
    //         data    : form.serialize(),
    //         success: function(data){
    //             alert(data.message)
    //             $('#tambahKategoriModal').modal('hide');
    //             console.log(data);
    //             $('#tambahkategoriform').trigger('reset');
    //             listKategori()
    //         }
            
            
    //         })
    // })
</script>
    