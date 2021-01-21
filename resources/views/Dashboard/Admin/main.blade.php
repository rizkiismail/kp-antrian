@extends('layouts.admin')

@section('breadcrumb')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-auto">
                <h2>Daftar Layanan</h2>
            </div>
            <div class="col-auto ml-auto">
                <a href="{{url('admin/addBagian')}}"><button class="btn btn-danger">Tambah + </button></a>
            </div>
        </div>
        <hr>
    </div>
@endsection

@section('content')
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
            @if (session('msg'))
                <div class="alert alert-info">
                    {{ session('msg') }}
                </div>
            @endif
            <table class="tableAngkatan table table-responsive-sm table-bordered" cellspacing="0" width="100%">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Layanan </th>
                        <th><i class="fa fa-ellipsis-v"></i></th>
                    </tr>
                    </thead>
                    <tbody class="table-hover">
                        @foreach($bagian as $row)
                            <tr>
                                <td>{{$row->bagian_id}}</td>
                                <td>{{$row->name}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn" style="cursor: pointer" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item " href="{{url('bagianEdit/'.$row->bagian_id)}}">Edit</a>
                                            <a class="dropdown-item " href="{{url('historyAntrian/'.$row->bagian_id)}}">Laporan Antrian</a>
                                            <a class="dropdown-item " href="{{url('deleteBagian/'.$row->bagian_id)}}" onclick="if( !confirm('Yakin akan menghapus layanan ini ?') ){ return false; }">Delete</a>
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
        $('.tableAngkatan').DataTable( );
    </script>
@endsection    