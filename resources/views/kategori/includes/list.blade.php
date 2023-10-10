<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th>Kategori</th>
            <th width="15%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategoris as $kategori)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="kategori-nama">{{ $kategori->nama }}</td>
                <td>
                    <a href="#"
                        class="btn btn-primary edit-kategori"
                        data-id="{{ $kategori->id }}"
                        data-nama="{{ $kategori->nama }}">Edit</a>
                 
                    <form id="hapusKategori{{$kategori->id}}" action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger"
                            onclick=" confirm('Apakah Anda yakin ingin menghapus kategori ini?'); return hapusKategori(event,{{ $kategori->id }})">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $kategoris->appends($_GET)->links() }} 