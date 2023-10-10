@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Daftar Pengeluaran</h1>
        </section>

        <div class="content">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-8">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#tambahPengeluaranModal">Tambah Pengeluaran</button>
                        </div>
                        <div class="col-md-4 text-right">
                            <div class="form-group">
                                <input id="searchPengeluaran" type="search" class="form-control" name="keyword"
                                    placeholder="Cari Pengeluaran...">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="listPengeluaran" class="box-body">
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('pengeluaran.edit')
    @include('pengeluaran.form')
@endsection


@section('scripts')
    <script>
        $(document).on('click', '.edit-pengeluaran', function() {
            var idPengeluaran = $(this).data('id');
            var tanggalPengeluaran = $(this).data('tanggal');
            var deskripsiPengeluaran = $(this).data('deskripsi');
            var nominalPengeluaran = $(this).data('nominal');

            //Mengatur nilai formulir edit
            $('#editPengeluaranForm').attr('action', '/pengeluaran/' + idPengeluaran);
            $('#edit_tanggal').val(tanggalPengeluaran);
            $('#edit_deskripsi').val(deskripsiPengeluaran);
            $('#edit_nominal').val(nominalPengeluaran);

            $('#editPengeluaranModal').modal('show');
        });
        // Mengirim Permintaan ajax saat formulir edit disubmit
        $('#editPengeluaranForm').submit(function(e) {
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
                    $('#editPengeluaranModal').modal('hide');
                    // Tidak perlu lagi me-refresh halaman secara manual
                    // listMember(url);
                    $('#pesanEdit').text('Pengeluaran berhasil diperbarui').addClass('alert-success')
                        .show();
                },
                error: function(error) {
                    alert('Terjadi kesalahan saat mengupdate member.');
                }
            });
        });
        var url = "{{ route('pengeluaran.index') }}"

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //var url = window.location.href
        listPengeluaran(url)
        $('#searchMember').keyup(function(e) {
            var keyword = $(this).val();
            listPengeluaran(url + "?keyword=" + keyword)


        });

        function listPengeluaran(url) {
            $.ajax({
                type: "GET",
                url: url,
                cache: false,
                success: function(response) {
                    $('#listPengeluaran').html(response);
                    $('ul.pagination a').click(function(e) {
                        e.preventDefault();
                        var url_page = $(this).attr("href");
                        listPengeluaran(url_page)
                    });
                }
            });
        }
        $(".addPengeluaran").click(function() {

            var form = $("#tambahPengeluaranForm"); // Tambahkan tanda pagar (#) sebelum "tambahMemberForm"
            var url_add = form.attr('action'); // Pastikan form memiliki atribut "action" yang benar
            $.ajax({
                url: url_add,
                method: "POST",
                data: form.serialize(),
                success: function(data) {
                    alert(data.message)
                    $('#tambahPengeluaranModal').modal('hide');
                    console.log(data);
                    $('#tambahPengeluaranForm').trigger('reset');
                    listPengeluaran(
                        url); // Gunakan url_add sebagai parameter untuk memperbarui daftar member
                }
            })
        });


        function hapusPengeluaran(e, id) {
            e.preventDefault();
            $.ajax({
                type: "DELETE",
                url: `{{ url('pengeluaran/${id}') }}`,
                success: function(response) {
                    alert(response.message);
                    listPengeluaran(url);
                }
            });
        }
    </script>
@endsection
