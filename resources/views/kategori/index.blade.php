@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Kategori</h1>
        </section>


        <div class="content">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#tambahKategoriModal">Tambah Kategori</button>
                        </div>
                        <div class="col-md-6">
                            {{-- <form class="form-inline pull-right" action="{{ route('kategori.index') }}" method="GET"> --}}
                            <div class="form-group">
                                <input id="searchKategori" type="search" class="form-control" name="keyword"
                                    placeholder="Cari kategori...">
                            </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
                <div id="listKategori" class="box-body">
                </div>
            </div>
        </div>
    </div>
    @include('kategori.edit')
    @include('kategori.form')
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.edit-kategori', function() {
            var idKategori = $(this).data('id');
            var namaKategori = $(this).data('nama');

            // Mengatur nilai formulir edit
            $('#editKategoriForm').attr('action', '/kategori/' + idKategori);
            $('#edit_nama_kategori').val(namaKategori);

            // Menampilkan modal edit
            $('#editKategoriModal').modal('show');
        });

        // Mengirim Permintaan ajax saat formulir edit disubmit
        $('#editKategoriForm').submit(function(e) {
            e.preventDefault(); // Menghentikan perilaku default form

            // Mengambil data dari formulir
            var formData = $(this).serialize();
            var url = $(this).attr('action'); // URL untuk mengirim permintaan

            // Menggunakan AJAX untuk mengirim data
            $.ajax({
                type: 'POST', // Ganti dengan 'PUT' jika diperlukan
                url: url,
                data: formData,
                success: function(response) {
                    console.log('Data berhasil disimpan:', response);
                    $('#editKategoriModal').modal('hide');

                    $('#pesanEdit').text('Kategori berhasil diperbarui.').addClass('alert-success')
                        .show();
                },
                error: function(error) {
                    alert('Terjadi kesalahan saat mengupdate kategori.');
                }
            });
        });

        var url = "{{ route('kategori.index') }}"

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //var url = window.location.href
        listKategori(url)
        $('#searchKategori').keyup(function(e) {
            var keyword = $(this).val();
            listKategori(url + "?keyword=" + keyword)


        });

        function listKategori(url) {
            $.ajax({
                type: "GET",
                url: url,
                cache: false,
                success: function(response) {
                    $('#listKategori').html(response);
                    // history.pushState("", '', url);
                    $('ul.pagination a').click(function(e) {
                        e.preventDefault();
                        var url_page = $(this).attr("href");
                        listKategori(url_page)

                    });
                }
            });
        }
        $(".addCategory").click(function() {

            var form = $("#tambahkategoriform");
            var url_add = form.attr("action")
            $.ajax({
                url: url_add,
                method: "POST",
                data: form.serialize(),
                success: function(data) {
                    alert(data.message)
                    $('#tambahKategoriModal').modal('hide');
                    console.log(data);
                    $('#tambahkategoriform').trigger('reset');
                    listKategori(url);
                }


            })
        });

        function hapusKategori(e, id) {
            e.preventDefault()
            $.ajax({
                type: "DELETE",
                url: `{{ url('kategori/${id}') }}`,
                success: function(response) {
                    alert(response.message)
                    listKategori(url)



                }
            });
        }
    </script>
@endsection
