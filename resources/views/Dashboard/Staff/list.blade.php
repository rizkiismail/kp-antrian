@extends('layouts.staff')

@section('breadcrumb')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-auto">
                <h2>Daftar Staff</h2>
            </div>
            <div class="col-auto ml-auto">
                <a href="{{url('staff/addStaff')}}"><button class="btn btn-danger">Tambah + </button></a>
            </div>
        </div>
        <hr>
    </div>
@endsection

@section('content')
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
            <table class="tablePembayaran table table-responsive-sm table-bordered" cellspacing="0" width="100%">
                    <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th><i class="fa fa-ellipsis-v"></i></th>
                    </tr>
                    </thead>
                    <tbody class="table-hover">
                        @foreach($staff as $row)
                            <tr>
                                <td>{{$row->staff_id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn" style="cursor: pointer" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item " href="{{url('edit_staff/'.$row->staff_id)}}">Edit</a>
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
        $('.tablePembayaran').DataTable( );
    </script>
@endsection    