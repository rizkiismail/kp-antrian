@extends('layouts.admin')

@section('breadcrumb')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-auto">
                <h2>Atur Pembayaran</h2>
            </div>
            <div class="col-auto ml-auto">
                <a href="{{url('admin/addPayment/'.$generation_id)}}"><button class="btn btn-info">Tambah + </button></a>
            </div>
        </div>
        <hr>
    </div>
@endsection

@section('content')
    <div class="container mb-5">
        <div class="row mb-5">
            <div class="col-12">
            @if (session('msg'))
                <div class="alert alert-info">
                    {{ session('msg') }}
                </div>
            @endif
            <table class="tablePayment table table-responsive-sm table-bordered" cellspacing="0" width="100%">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Jenis Pembayaran</th>
                        <th>Nominal</th>
                        <th>Status</th>
                        <th><i class="fa fa-ellipsis-v"></i></th>
                    </tr>
                    </thead>
                    <tbody class="table-hover">
                        @foreach ($payment as $row)
                            <tr>
                                <td>{{$row->payment_id}}</td>
                                <td>{{$row->payment}}</td>
                                <td>{{$row->nominal}}</td>
                                <td>{{$row->status}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn" style="cursor: pointer" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item " href="{{url('paymentEdit/'.$row->payment_id)}}">Edit</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
       </div>
        <form method="post" action="<?=url("tambah_pembayaran_semester")?>">
        @csrf
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="form-group">
                        <h4>Semester 1</h4>
                        <input type="hidden" name="generation_id" value="{{$generation_id}}">    
                        <select name="semester1[]" class="select2 w-100" multiple>
                            @foreach ($payment as $row)
                                <option value="{{$row->payment_id}}" <?=(in_array($row->payment_id, $semester1) ? 'selected' : '')?> >{{$row->payment}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h4>Semester 2</h4>
                        <select name="semester2[]" class="select2 w-100" multiple>
                            @foreach ($payment as $row)
                                <option value="{{$row->payment_id}}" <?=(in_array($row->payment_id, $semester2) ? 'selected' : '')?>>{{$row->payment}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h4>Semester 3</h4>
                        <select name="semester3[]" class="select2 w-100" multiple>
                            @foreach ($payment as $row)
                                <option value="{{$row->payment_id}}" <?=(in_array($row->payment_id, $semester3) ? 'selected' : '')?>>{{$row->payment}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h4>Semester 4</h4>
                        <select name="semester4[]" class="select2 w-100" multiple>
                            @foreach ($payment as $row)
                                <option value="{{$row->payment_id}}" <?=(in_array($row->payment_id, $semester4) ? 'selected' : '')?>>{{$row->payment}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h4>Semester 5</h4>
                        <select name="semester5[]" class="select2 w-100" multiple>
                            @foreach ($payment as $row)
                                <option value="{{$row->payment_id}}" <?=(in_array($row->payment_id, $semester5) ? 'selected' : '')?>>{{$row->payment}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h4>Semester 6</h4>
                        <select name="semester6[]" class="select2 w-100" multiple>
                            @foreach ($payment as $row)
                                <option value="{{$row->payment_id}}" <?=(in_array($row->payment_id, $semester6) ? 'selected' : '')?>>{{$row->payment}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h4>Semester 7</h4>
                        <select name="semester7[]" class="select2 w-100" multiple>
                            @foreach ($payment as $row)
                                <option value="{{$row->payment_id}}" <?=(in_array($row->payment_id, $semester7) ? 'selected' : '')?>>{{$row->payment}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h4>Semester 8</h4>
                        <select name="semester8[]" class="select2 w-100" multiple>
                            @foreach ($payment as $row)
                                <option value="{{$row->payment_id}}" <?=(in_array($row->payment_id, $semester8) ? 'selected' : '')?>>{{$row->payment}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-info" type="submit">Proses</button>
                </div>     
            </div> 
        </form>     
    </div>
@endsection

@section('script')
    <script>
        $('.tablePayment').DataTable( );
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection