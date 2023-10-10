<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th width="15%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($suppliers as $supplier)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $supplier->nama }}</td>
            <td>{{ $supplier->alamat }}</td>
            <td>{{ $supplier->telepon }}</td>
            <td>
                <a href="#" class="btn btn-primary edit-supplier"
                data-id="{{ $supplier->id }}"
                data-nama="{{ $supplier->nama }}"
                data-alamat="{{ $supplier->alamat }}"
                data-telepon="{{ $supplier->telepon }}">Edit</a>
                
                <form id="hapusSupplier{{$supplier->id}}" action="{{ route('supplier.destroy', $supplier->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" 
                    onclick=" confirm('Apakah Anda yakin ingin menghapus supplier ini?'); return hapusSupplier(event,{{ $supplier->id }} )">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $suppliers->appends($_GET)->links() }} 


