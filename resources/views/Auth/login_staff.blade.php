@extends('layouts.staff')

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
                        <h3>Staff Login</h3>
                    </div>
                    <form method="post" action="<?=url("login_staff/execute")?>">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" required>
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