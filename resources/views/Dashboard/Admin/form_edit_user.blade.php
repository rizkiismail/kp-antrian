@extends('layouts.admin')

@section('breadcrumb')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-auto">
                <h2>Edit Mahasiswa</h2>
            </div>
        </div>
        <hr>
    </div>
@endsection

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                @if (session('msg'))
                    <div class="alert alert-success">
                        {{ session('msg') }}
                    </div>
                @endif
                <form method="post" action="<?=url("editUser/execute")?>">
                    @csrf
                    <div class="pt-3">
                        <div class="form-group">
                            <label>NIM</label>
                            <input required name="nim" type="text" class="form-control" value="{{$user->nim}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input required name="name" type="text" class="form-control" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input required name="email" type="email" class="form-control" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label>Program Studi</label>
                            <input required name="program" type="text" class="form-control" value="{{$user->program}}">
                        </div>
                        <div class="form-group">
                            <label>Angkatan</label>
                            <input required name="generation" type="text" class="form-control" value="{{$user->generation}}">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="address" id="" cols="30" rows="5" class="form-control">{{$user->address}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Nomor Handphone</label>
                            <input required name="no_handphone" type="text" class="form-control" value="{{$user->no_handphone}}">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control">
                        </div>

                        <button class="btn btn-info" type="submit">Edit</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
@endsection