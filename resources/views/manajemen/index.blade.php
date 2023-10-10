@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Daftar User</h1>
        </section>

        <div class="content">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#tambahUserModal">Tambah User</button>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="searchUser" type="search" class="form-control" name="keyword"
                                    placeholder="Cari User...">
                            </div>
                        </div>
                    </div>
                </div>
                @include('manajemen.includes.list')
                <div id="listUser" class="box-body">
                </div>
            </div>
        </div>
    </div>.

    @include('manajemen.form')
    @include('manajemen.edit')
@endsection

@section('scripts')
    <script>
        $(document).on('click', '.edit-user', function() {
            var idUser = $(this).data('id');
            var namaUser = $(this).data('nama_user');
            var emailUser = $(this).data('email');
            var passwordUser = $(this).data('password');
            var rePasswordUser = $(this).data('re_password');

            // Mengatur nilai formulir edit
            $('#editUserForm').attr('action', '/user/' + idUser);
            $('#edit_nama').val(namaUser);
            $('#edit_email').val(emailUser);
            $('#edit_password').val(passwordUser);
            $('#edit_repassword').val(rePasswordUser);

            // Menampilkan modal edit
            $('#editUserModal').modal('show');
        });

        // Mengirim Permintaan ajax saat formulir edit disubmit
        $('#editUserForm').submit(function(e) {
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
                    $('#editUserModal').modal('hide');
                    // Tidak perlu lagi me-refresh halaman secara manual
                    // listMember(url);
                    $('#pesanEdit').text('User berhasil diperbarui').addClass('alert-success').show();
                },
                error: function(error) {
                    alert('Terjadi kesalahan saat mengupdate user.');
                }
            });
        });


        var url = "{{ route('user.index') }}"

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //var url = window.location.href
        listUser(url)
        $('#searchUser').keyup(function(e) {
            var keyword = $(this).val();
            listUser(url + "?keyword=" + keyword)


        });

        function listUser(url) {
            $.ajax({
                type: "GET",
                url: url,
                cache: false,
                success: function(response) {
                    $('#listUser').html(response);
                    $('ul.pagination a').click(function(e) {
                        e.preventDefault();
                        var url_page = $(this).attr("href");
                        listUser(url_page)
                    });
                }
            });
        }

        $(".addUser").click(function() {
            var form = $("#tambahUserForm");
            var url_add = form.attr('action');
            $.ajax({
                url: url_add,
                method: "POST",
                data: form.serialize(),
                success: function(data) {
                    alert(data.message);
                    $('#tambahUserModal').modal('hide');
                    console.log(data);
                    $('#tambahUserForm').trigger('reset');
                    // Reload halaman setelah data disimpan dengan sukses
                    window.location.reload();
                }
            });
        });

        function hapusUser(e, id) {
            e.preventDefault();
            $.ajax({
                type: "DELETE",
                url: `{{ url('user/${id}') }}`,
                success: function(response) {
                    alert(response.message);
                    listUsers(url);
                }
            });
        }
    </script>
@endsection
