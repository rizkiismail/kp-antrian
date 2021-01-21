@extends('layouts.admin')

@section('breadcrumb')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-auto">
                <h2>Histori Antrian</h2>
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
            <table class="tabelAdmin table table-responsive-sm table-bordered" cellspacing="0" width="100%">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>No Antrian </th>
                        <th>NIM</th>
                        <th>Layanan</th>
                        <th>Status</th>
                        <th>Tanggal Waktu</th>
                    </tr>
                    </thead>
                    <tbody class="table-hover">
                        @foreach($antrian as $row)
                            <tr>
                                <td>{{$row->antrian_id}}</td>
                                <td>{{$row->no_antrian}}</td>
                                <td>{{$row->nim}}</td>
                                <td>{{$row->bagian}}</td>
                                <td>{{$row->status}}</td>
                                <td>{{$row->tanggal}}</td>
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
        $('.tabelAdmin').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    </script>
@endsection    