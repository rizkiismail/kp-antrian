@extends('layouts.main')

@section('content')
    <div class="container" style="height: 90vh;">
        <div class="row justify-content-center" style="height: 90%;">
            <div class="col-4 align-self-center">
                @if (session('msg'))
                    <div class="alert alert-info">
                        {{ session('msg') }}
                    </div>
                @endif
                <div class="card pt-3">
                    <div class="text-center">
                        <h3>Login</h3>
                    </div>
                    <form method="post" action="<?=url("login/execute")?>">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" class="form-control" name="nim" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" required class="form-control">
                            </div>
                            <button class="btn btn-danger" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection