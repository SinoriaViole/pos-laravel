@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Daftar Member</h1>
        </section>

        <div class="content">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#tambahMemberModal">Tambah Member</button>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="searchMember" type="search" class="form-control" name="keyword"
                                    placeholder="Cari member...">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="listMember" class="box-body">
                </div>
            </div>
        </div>
    </div>

    @include('member.form')
    @include('member.edit')
@endsection

@section('scripts')
    <script>
        $(document).on('click', '.edit-member', function() {
            var idMember = $(this).data('id');
            var kodeMember = $(this).data('kode_member');
            console.log("Kode Member:", kodeMember);
            var namaMember = $(this).data('nama');
            var alamatMember = $(this).data('alamat');
            var teleponMember = $(this).data('telepon');

            // Mengatur nilai formulir edit
            $('#editMemberForm').attr('action', '/member/' + idMember);
            $('#edit_kode_member').val(kodeMember);
            $('#edit_nama').val(namaMember);
            $('#edit_alamat').val(alamatMember);
            $('#edit_telepon').val(teleponMember);

            // Menampilkan modal edit
            $('#editMemberModal').modal('show');
        });

        // Mengirim Permintaan ajax saat formulir edit disubmit
        $('#editMemberForm').submit(function(e) {
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
                    $('#editMemberModal').modal('hide');
                    // Tidak perlu lagi me-refresh halaman secara manual
                    // listMember(url);
                    $('#pesanEdit').text('Member berhasil diperbarui').addClass('alert-success').show();
                },
                error: function(error) {
                    alert('Terjadi kesalahan saat mengupdate member.');
                }
            });
        });

        var url = "{{ route('member.index') }}"

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //var url = window.location.href
        listMember(url)
        $('#searchMember').keyup(function(e) {
            var keyword = $(this).val();
            listMember(url + "?keyword=" + keyword)


        });

        function listMember(url) {
            $.ajax({
                type: "GET",
                url: url,
                cache: false,
                success: function(response) {
                    $('#listMember').html(response);
                    $('ul.pagination a').click(function(e) {
                        e.preventDefault();
                        var url_page = $(this).attr("href");
                        listMember(url_page)
                    });
                }
            });
        }
        $(".addMember").click(function() {

            var form = $("#tambahMemberForm"); // Tambahkan tanda pagar (#) sebelum "tambahMemberForm"
            var url_add = form.attr('action'); // Pastikan form memiliki atribut "action" yang benar
            $.ajax({
                url: url_add,
                method: "POST",
                data: form.serialize(),
                success: function(data) {
                    alert(data.message)
                    $('#tambahMemberModal').modal('hide');
                    console.log(data);
                    $('#tambahMemberForm').trigger('reset');
                    listMember(
                        url); // Gunakan url_add sebagai parameter untuk memperbarui daftar member
                }
            })
        });


        function hapusMember(e, id) {
            e.preventDefault();
            $.ajax({
                type: "DELETE",
                url: `{{ url('member/${id}') }}`,
                success: function(response) {
                    alert(response.message);
                    listMember(url);
                }
            });
        }
    </script>
@endsection
