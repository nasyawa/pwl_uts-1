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
                <a href="{{url('pasien/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>No RM</th>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data->count() > 0)
                        @foreach($data as $i => $h)
                        <tr>
                            <td>{{($data->currentPage()-1)*$data->perPage()+$i+1}}</td>
                            <td>{{$h->id_pasien}}</td>
                            <td>{{$h->rm}}</td>
                            <td>{{$h->nama}}</td>
                            <td>{{$h->alamat}}</td>
                            <td>{{$h->jk}}</td>
                            <td>
                                <a href="{{ url('/pasien/'. $h->id_pasien.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ url('/pendaftaran/'. $h->id_pasien.'/daftar') }}" class="btn btn-sm btn-primary">Daftar</a>
                                <form method="POST" action="{{ url('/pasien/'.$h->id_pasien) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
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