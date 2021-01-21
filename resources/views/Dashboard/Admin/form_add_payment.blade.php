@extends('layouts.admin')

@section('breadcrumb')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-auto">
                <h2>Tambah Jenis Pembayaran</h2>
            </div>
        </div>
        <hr>
    </div>
@endsection

@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <form method="post" action="<?=url("tambah_pembayaran")?>">
                @csrf
                    <div class="form-group">
                        <label>Jenis Pembayaran</label>
                        <input type="text" name="payment" class="form-control">
                        <input type="hidden" name="generation_id" class="form-control" value="{{$generation_id}}">
                    </div>
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" name="nominal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="published">Aktif</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>

                    <button class="btn btn-info" type="submit">Proses</button>
                </form>    
            </div>    
        </div>     
    </div>
@endsection