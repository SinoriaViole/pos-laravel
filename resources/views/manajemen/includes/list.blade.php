<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th>Nama User</th>
            <th>Email</th>
            <th width="15%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name}}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="#" class="btn btn-primary edit-user"
                data-id="{{ $user->id}}"
                data-nama="{{ $user->name }}"
                data-email="{{ $user->email }}">Edit</a>
                
                <form id="hapusUser{{$user->id}}" action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger" 
                    onclick=" confirm('Apakah Anda yakin ingin menghapus user ini?'); return hapusUser(event,{{ $user->id }})">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $users->appends($_GET)->links() }} 