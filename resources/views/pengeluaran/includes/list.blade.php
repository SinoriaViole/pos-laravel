<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th>Tanggal</th>
            <th>Deskripsi</th>
            <th>Nominal</th>
            <th width="15%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengeluarans as $pengeluaran)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pengeluaran->tanggal }}</td>
                <td>{{ $pengeluaran->deskripsi }}</td>
                <td>{{ $pengeluaran->nominal }}</td>
                <td>
                  <a href="#" class="btn btn-primary edit-pengeluaran"
                  data-id="{{ $pengeluaran->id }}"
                  data-tanggal="{{ $pengeluaran->tanggal }}"
                  data-deskripsi="{{ $pengeluaran->deskripsi }}"
                  data-nominal="{{ $pengeluaran->nominal }}">Edit</a>

                  <form id="hapusPengeluaran{{$pengeluaran->id}}" action="{{route('pengeluaran.destroy', $pengeluaran->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger"
                    onclick="confirm('Apakah Anda yakin ingin menghapus ini?'); return hapusPengeluaran(event,{{ $pengeluaran->id }})">Hapus</button>
                  </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $pengeluarans->appends($_GET)->links() }} `
