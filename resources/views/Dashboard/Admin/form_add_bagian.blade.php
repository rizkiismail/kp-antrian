@extends('layouts.admin')

@section('breadcrumb')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-auto">
                <h2>Tambah Layanan</h2>
            </div>
        </div>
        <hr>
    </div>
@endsection

@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <form method="post" action="<?=url("tambah_layanan")?>">
                @csrf
                    <div class="form-group">
                        <label>Layanan</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <button class="btn btn-danger" type="submit">Proses</button>
                </form>    
            </div>    
        </div>     
    </div>
@endsection