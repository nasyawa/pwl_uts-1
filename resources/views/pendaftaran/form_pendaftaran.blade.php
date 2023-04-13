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
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">General Elements</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ $url_form }}" method="POST">
                    @csrf
                    {!! isset($data)? method_field('PUT') : '' !!}
                    <div class="row">
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label>ID</label>
                                <input type="text" class="form-control" value="{{ $pasien -> id_pasien }}" disabled>
                                <input type="hidden" name="id_pasien" value="{{ $pasien -> id_pasien }}">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Nomor RM</label>
                                <input type="text" class="form-control" name="rm" value="{{ $pasien->rm }}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ $pasien->nama }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="{{ $pasien -> alamat }}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input type="text" class="form-control" name="jk" value="{{ $pasien -> jk }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- select -->
                            <div class="form-group">
                                <label>Dokter</label>
                                <select class="form-control" name="id_dokter">
                                    @foreach($datas as $a)
                                    <option value="{{$a -> id_dokter}}" <?php if (isset($data)) {
                                                                            if ($a->id_dokter == $data->id_dokter) { ?> selected <?php }
                                                                                                                            } ?>>{{$a ->nama}} - {{$a -> poli}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Keluhan</label>
                                <input type="text" class="form-control" name="keluhan" value="{{isset($data)? $data->keluhan : old('keluhan')}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection