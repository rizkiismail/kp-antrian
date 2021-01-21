@extends('layouts.main')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-6">
                @if (session('msg'))
                    <div class="alert alert-danger">
                        {{ session('msg') }}
                    </div>
                @endif
                <form method="post" action="<?=url("register/execute")?>">
                    @csrf
                    <div class="card pt-3">
                        <div class="text-center">
                            <h3>Register</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>NIM</label>
                                <input required name="nim" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input required name="name" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input required name="email" type="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input required name="password" type="password" class="form-control">
                            </div>

                            <button class="btn btn-danger" type="submit">Register</button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
@endsection