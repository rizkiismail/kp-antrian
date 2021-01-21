@extends('layouts.staff')

@section('breadcrumb')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-auto">
                <h2>Edit Staff</h2>
            </div>
        </div>
        <hr>
    </div>
@endsection

@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <form method="post" action="<?=url("edit_staff_execute/".$staff->staff_id)?>">
                @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" value="{{$staff->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{$staff->email}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <button class="btn btn-danger" type="submit">Proses</button>
                </form>    
            </div>    
        </div>     
    </div>
@endsection