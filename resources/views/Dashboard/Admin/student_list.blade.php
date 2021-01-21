@extends('layouts.admin')

@section('breadcrumb')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-auto">
                <h2>Daftar Mahasiswa</h2>
            </div>
        </div>
        <hr>
    </div>
@endsection

@section('content')
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
            <table class="tableMahasiswa table table-responsive-sm table-bordered" cellspacing="0" width="100%">
                    <thead class="thead-dark">
                    <tr>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th><i class="fa fa-ellipsis-v"></i></th>
                    </tr>
                    </thead>
                    <tbody class="table-hover">
                        @foreach ($user as $row)
                            <tr>
                                <td>{{$row->nim}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->program}}</td>
                                <td>{{$row->no_handphone}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn" style="cursor: pointer" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item " href="{{url('userEdit/'.$row->nim)}}">Edit</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
       </div>     
    </div>
@endsection

@section('script')
    <script>
        $('.tableMahasiswa').DataTable( );
    </script>
@endsection    