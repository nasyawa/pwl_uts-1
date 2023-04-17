@extends("layouts.templates")
@section("content")
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tabel Mahasiswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tabel Mahasiswa</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>No RM</th>
                            <th>Nama Pasien</th>
                            <th>Dokter</th>
                            <th>Poli</th>
                            <th>Perawat</th>
                            <th>Keluhan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data->count() > 0)
                        @foreach($data as $i => $h)
                        <tr>
                            <td>{{($data->currentPage()-1)*$data->perPage()+$i+1}}</td>
                            <td>{{$h->id_pasien}}</td>
                            <td>{{$h->rm}}</td>
                            <td>{{$h->nama_pasien}}</td>
                            <td>{{$h->nama_dokter}}</td>
                            <td>{{$h->poli}}</td>
                            <td>{{$h->nama_perawat}}</td>
                            <td>{{$h->keluhan}}</td>
                            <td>
                                <a href="{{ url('/pendaftaran/'. $h->id_daftar.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                                <form method="POST" action="{{ url('/pasien/'.$h->id_daftar) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="alert('Data Ingin Dihapus ?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6" class="text-center">Data tidak ada</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <div class="row">
                    {{ $data->links() }}
                </div>
            </div>
            <!-- /.card-body -->
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection