<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th>Kode Produk</th>
            <th>Kategori</th>
            <th>Nama Produk</th>
            <th>Merk</th>
            <th>Harga Beli</th>
            <th>Diskon</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th width="15%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produks as $produk)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $produk->kode_produk }}</td>
            <td>{{ $produk->category ? $produk->category->nama : 'Tidak Ada Kategori' }}</td>
            {{-- <td>{{ $produk->category ? $produk->category->nama : 'Tidak Ada Kategori' }}</td> --}}
            <td>{{ $produk->nama_produk }}</td>
            <td>{{ $produk->merk }}</td>
            <td>{{ $produk->harga_beli }}</td>
            <td>{{ $produk->diskon }}</td>
            <td>{{ $produk->harga_jual }}</td>
            <td>{{ $produk->stok }}</td>
            <td>
                <a href="#" class="btn btn-primary edit-produk"
                    data-id="{{ $produk->id}}"
                    data-kode="{{ $produk->kode_produk}}"
                    data-kategori="{{ $produk->category->nama}}"
                    data-nama="{{ $produk->nama_produk}}"
                    data-merk="{{ $produk->merk }}"
                    data-hargabeli="{{ $produk->harga_beli }}"
                    data-diskon="{{ $produk->diskon }}"
                    data-stok="{{ $produk->stok}}"> Edit</a>


                <form id="hapusProduk{{$produk->id}}" action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" 
                    onclick=" confirm('Apakah Anda yakin ingin menghapus produk ini?'); return hapusProduk(event,{{ $produk->id }})">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
    
    
    </tbody>
</table>
{{ $produks->appends($_GET)->links() }} 