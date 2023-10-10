@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Daftar Pembelian</h1>
        </section>

        <div class="content">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-6">
                            <button onclick="addForm()" class="btn btn-success"><i class="fa fa-plus-circle"></i> Transaksi Baru</button>
                        </div>
                        <div class="col-md-6">
                            <form class="form-inline pull-right" action="{{ route('daftarbeli.index') }}" method="GET">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="keyword" placeholder="Cari Pengeluaran...">
                                </div>
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                
        
                <div class="box-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Tanggal</th>
                                <th>Supplier</th>
                                <th>Total Item</th>
                                <th>Total Harga</th>
                                <th>Diskon</th>
                                <th>Total Bayar</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

  @include('daftarpembelian.supplier')

@endsection
@section('scripts')
    <script>
        function addForm() {
            $('#modal-supplier').modal('show');
            
        }
        </script>
@endsection

