<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th>Kode Member</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th width="15%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $member)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $member->kode_member }}</td>
            <td>{{ $member->nama }}</td>
            <td>{{ $member->alamat }}</td>
            <td>{{ $member->telepon }}</td>
            <td>
                <a href="#" class="btn btn-primary edit-member"
                data-id="{{ $member->id}}"
                data-kode-member="{{ $member->kode_member }}"
                data-nama="{{ $member->nama }}"
                data-alamat="{{ $member->alamat }}"
                data-telepon="{{ $member->telepon }}">Edit</a>
          
                <form id="hapusMember{{$member->id}}" action="{{ route('member.destroy', $member->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" 
                    onclick=" confirm('Apakah Anda yakin ingin menghapus member ini?'); return hapusMember(event,{{ $member->id }})">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $members->appends($_GET)->links() }} `