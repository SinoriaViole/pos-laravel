@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Daftar Supplier</h1>
        </section>

        <div class="content">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#tambahSupplierModal">Tambah Supplier</button>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="searchSupplier" type="search" class="form-control" name="keyword"
                                    placeholder="Cari supplier...">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="listSupplier" class="box-body">
                </div>
            </div>
        </div>
    </div>
    @include('supplier.form')
    @include('supplier.edit')
@endsection

@section('scripts')
<script>
    $(document).on('click', '.edit-supplier', function() {
        var idSupplier = $(this).data('id');
        var namaSupplier = $(this).data('nama');
        var alamatSupplier = $(this).data('alamat');
        var teleponSupplier = $(this).data('telepon');

        // Mengatur nilai formulir edit
        $('#editSupplierForm').attr('action', '/supplier/' + idSupplier);
        $('#edit_nama').val(namaSupplier);
        $('#edit_alamat').val(alamatSupplier);
        $('#edit_telepon').val(teleponSupplier);

        // Menampilkan modal edit
        $('#editSupplierModal').modal('show');
    });

    // Mengirim Permintaan ajax saat formulir edit disubmit
    $('#editSupplierForm').submit(function(e) {
        e.preventDefault(); // Menghentikan perilaku default form

        // Mengambil data dari formulir
        var formData = $(this).serialize();
        var url = $(this).attr('action'); // URL untuk mengirim permintaan

        // Menggunakan AJAX untuk mengirim data
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            success: function(response) {
                console.log('Data berhasil disimpan:', response);
                $('#editSupplierModal').modal('hide');
                // Tidak perlu lagi me-refresh halaman secara manual
               // listSupplier(url);
                $('#pesanEdit').text('Supplier berhasil diperbarui').addClass('alert-success').show();
            },
            error: function(error) {
                alert('Terjadi kesalahan saat mengupdate supplier.');
            }
        });
    });

    var url = "{{ route('supplier.index') }}"

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    listSupplier(url)
    $('#searchSupplier').keyup(function(e) {
        var keyword = $(this).val();
        listSupplier(url + "?keyword=" + keyword)
    });

    function listSupplier(url) {
        $.ajax({
            type: "GET",
            url: url,
            cache: false,
            success: function(response) {
                $('#listSupplier').html(response);
                $('ul.pagination a').click(function(e) {
                    e.preventDefault();
                    var url_page = $(this).attr("href");
                    listSupplier(url_page)
                });
            }
        });
    }

    $(".addSupplier").click(function() {
        var form = $("#tambahSupplierForm");
        var url_add = form.attr('action');
        $.ajax({
            url: url_add,
            method: "POST",
            data: form.serialize(),
            success: function(response) {
                alert(response.message); // Menggunakan response.message
                $('#tambahSupplierModal').modal('hide');
                console.log(response);
                $('#tambahSupplierForm').trigger('reset');
                listSupplier(url);
            }
        })
    });

    function hapusSupplier(e, id) {
        e.preventDefault();
        $.ajax({
            type: "DELETE",
            url: `{{ url('supplier/${id}') }}`,
            success: function (response) {
                alert(response.message);
                listSupplier(url);
                
            }
        });
        
    }
</script>
@endsection

