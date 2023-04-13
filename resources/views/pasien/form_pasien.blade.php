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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nomor RM</label>
                                @if(isset($data))
                                <input type="text" class="form-control" name="rm" value="{{ isset($data)? $data->rm : old('rm') }}" disabled>
                                @else
                                <input type="text" class="form-control" name="rm" value="{{ isset($data)? $data->rm : old('rm') }}">
                                @endif
                                @error('rm')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ isset($data)? $data->nama : old('nama') }}">
                                @error('nama')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label>Alamat</label>
                                <!-- <textarea type="text-area" class="form-control" name="alamat">{{ isset($data)? $data->alamat : old('alamat') }}</textarea> -->
                                <input type="text" class="form-control" name="alamat" value="{{ isset($data)? $data->alamat : old('alamat') }}">
                                @error('alamat')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input type="text" class="form-control" name="jk" value="{{ isset($data)? $data->jk : old('jk') }}">
                                @error('jk')
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
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