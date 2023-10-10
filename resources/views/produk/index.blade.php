@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Produk</h1>
        </section>

        <div class="content">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#tambahProdukModal">Tambah produk</button>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="searchProduk" type="search" class="form-control" name="keyword"
                                    placeholder="Cari produk...">
                            </div>

                        </div>
                    </div>
                </div>

                <div id="listProduk" class="box-body">

                </div>
            </div>`
        </div>
    </div>
    @include('produk.form')
    @include('produk.edit')
@endsection

@section('scripts')
    <script>
        $(document).on('click', '.edit-produk', function() {
            var idProduk = $(this).data('id');
            var kodeProduk = $(this).data('kode');
            var namaKategori = $(this).data('idKategori');
            var namaProduk = $(this).data('nama');
            var merkProduk = $(this).data('merk');
            var hargaBeliProduk = $(this).data('harga_beli');
            var diskonProduk = $(this).data('diskon');
            var hargaJualProduk = $(this).data('harga_jual');
            var stokProduk = $(this).data('stok');


            //Memgatur nilai formulir edit
            $('#editProdukForm').attr('action', '/produk/' +idProduk);
            $('#edit_kode').val(kodeProduk);
            $('#kategori').val(namaKategori);
            $('#edit_nama').val(namaProduk);
            $('#edit_merk').val(merkProduk);
            $('#edit_harga_beli').val(hargaBeliProduk);
            $('#edit_diskon').val(diskonProduk);
            $('#edit_harga_jual').val(hargaJualProduk);
            $('#edit_stok').val(stokProduk);

            //menampilkan modal edit
            $('#editProdukModal').modal('show');

        });
           // Mengirim Permintaan ajax saat formulir edit disubmit
           $('#editProdukForm').submit(function(e) {
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
                    $('#editProdukModal').modal('hide');
                    // Tidak perlu lagi me-refresh halaman secara manual
                    // listMember(url);
                    $('#pesanEdit').text('Produk berhasil diperbarui').addClass('alert-success').show();
                },
                error: function(error) {
                    alert('Terjadi kesalahan saat mengupdate produk.');
                }
            });
        });
        var url = "{{ route('produk.index') }}"

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        listProduk(url)
        $('#searchProduk').keyup(function(e) {
            var keyword = $(this).val();
            listProduk(url + "?keyword=" + keyword)

        });

        function listProduk(url) {
            $.ajax({
                type: "GET",
                url: url,
                cache: false,
                success: function(response) {
                    console.log(response);
                    $('#listProduk').html(response);
                    $('ul.pagination a').click(function(e) {
                        e.preventDefault();
                        var url_page = $(this).attr("href");
                        listProduk(url_page)
                    });
                }
            });
        }

        $(".addProduk").click(function() {

            var form = $("#tambahProdukModal");
            var url_add = form.attr('action');
            $.ajax({
                url: url_add,
                type: "POST",
                data: form.serialize(),
                success: function(data) {
                    alert(data.message)
                    $('#tambahProdukModal').modal('hide');
                    console.log(data);
                    $('#tambahProdukForm').trigger('reset');
                    listProduk(url);

                }
            })
        });


        function hapusProduk(e, id) {
            e.preventDefault();
            $.ajax({
                type: "DELETE",
                url: `{{url('produk/${id}') }}`,
                success: function (response) {
                    alert(response.message);
                    listProduk(url);
                    
                }
            });
            
        }
    </script>
@endsection
