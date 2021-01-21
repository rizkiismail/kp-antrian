@extends('layouts.main')

@section('content')
    <div class="container mt-5 mb-5">
        @if (session('msg'))
            <div class="alert alert-info">
                {{ session('msg') }}
            </div>
        @endif

        @if(!$bukti_bayar)
            <form method="post" action="<?=url("bayar_semester")?>" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <h3>Semester {{$semester}}</h3>
                    </div>
                    <div class="col-4">
                    <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input type="text" class="form-control" value="{{ Session::get('name')}}">
                        <input type="hidden" name="semester" class="form-control" value="{{$semester}}">
                    </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>NIM Mahasiswa</label>
                            <input type="text" name="nim" class="form-control" value="{{ Session::get('nim')}}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Jenis Pembayaran</p>
                            @foreach($payment as $row)
                                <div class="mb-3">
                                    <input type="checkbox" name="payment_ids[]" value="{{$row->payment_detail->payment_id}}" class="checkBayaran" data-harga="{{$row->payment_detail->nominal}}" id="{{$row->payment_detail->payment_id}}"> <label for="{{$row->payment_detail->payment_id}}" >{{$row->payment_detail->payment}}</label>
                                </div>
                            @endforeach
                        <div class="mb-3 mt-1">
                            <p>Keterangan</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <p>Rincian</p>
                            @foreach($payment as $row)
                                <input type="text" class="form-control mb-2" value="{{$row->payment_detail->nominal}}">
                            @endforeach
                            <input type="text" name="keterangan" class="form-control mb-2" value="">
                        </div>
                    </div>
                    <div class="col-4 text-center align-self-center">
                        <div class="form-group">
                            <p>Jumlah Bayar</p>
                            <input type="number" readonly class="form-control" name="total_bayar" id="total_bayar" value="0">
                        </div>
                        <div class="form-group">
                            <p>Jumlah Belum Bayar</p>
                            <input type="number" readonly class="form-control" name="sisa_bayar" id="sisa_bayar" value="{{$nominal}}">
                        </div>
                        <div class="form-group">
                            <p>Upload Bukti Pembayaran</p>
                            <input type="file" class="form-control" name="file" required>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-auto">
                        <button class="btn btn-info" type="submit">Simpan</button>
                    </div>
                </div>
            </form> 
        @else
            <div class="row">
                <div class="col-12 mb-3">
                    <h3>Semester {{$semester}}</h3>
                </div>
                <div class="col-12">
                    <p>Tanggal : {{$bukti_bayar['tanggal']}}</p>
                    <p>Total bayar : {{ rupiah($bukti_bayar['total_bayar'],'Rp. ') }}</p>
                    <p>Sisa bayar : {{ rupiah($bukti_bayar['sisa_bayar'],'Rp. ') }}</p>
                    <p>Keterangan : {{ $bukti_bayar['keterangan'] }}</p>
                    <p>Bukti Pembayaran</p>
                    <img src="{{url($bukti_bayar['bukti_bayar'])}}" alt="" width="300" height="auto">
                </div>
            </div>
            @if($bukti_tunggak_bayar)
                <div class="row">
                    <div class="col-12 mb-3">
                        <h3>Tunggakan Semester {{$semester}}</h3>
                    </div>
                    <div class="col-12">
                        <p>Tanggal : {{$bukti_tunggak_bayar['tanggal']}}</p>
                        <p>Total bayar : {{ rupiah($bukti_tunggak_bayar['total_bayar'],'Rp. ') }}</p>
                        <p>Keterangan : {{ $bukti_tunggak_bayar['keterangan'] }}</p>
                        <p>Bukti Pembayaran</p>
                        <img src="{{url($bukti_tunggak_bayar['bukti_bayar'])}}" alt="" width="300" height="auto">
                    </div>
                </div>
            @elseif($bukti_bayar['sisa_bayar'] > 0)
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="<?=url("bayar_tunggak_semester")?>" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <h3>Tunggakan Semester {{$semester}}</h3>
                                </div>
                                <div class="col-4">
                                <div class="form-group">
                                    <label>Nama Mahasiswa</label>
                                    <input type="text" class="form-control" value="{{ Session::get('name')}}">
                                    <input type="hidden" name="semester" class="form-control" value="{{$semester}}">
                                </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>NIM Mahasiswa</label>
                                        <input type="text" name="nim" class="form-control" value="{{ Session::get('nim')}}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <p>Jenis Pembayaran</p>
                                        @foreach($payment_tunggak as $row)
                                            <div class="mb-3">
                                                <input type="checkbox" checked disabled value="{{$row->payment_detail->payment_id}}" class="checkBayaran" data-harga="{{$row->payment_detail->nominal}}" id="{{$row->payment_detail->payment_id}}"> <label for="{{$row->payment_detail->payment_id}}" >{{$row->payment_detail->payment}}</label>
                                            </div>
                                        @endforeach
                                    <div class="mb-3 mt-1">
                                        <p>Keterangan</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <p>Rincian</p>
                                        @foreach($payment_tunggak as $row)
                                            <input type="text" disabled class="form-control mb-2" value="{{$row->payment_detail->nominal}}">
                                        @endforeach
                                        <input type="text" name="keterangan" class="form-control mb-2" value="">
                                    </div>
                                </div>
                                <div class="col-4 text-center align-self-center">
                                    <div class="form-group">
                                        <p>Jumlah Bayar</p>
                                        <input type="number" readonly class="form-control" name="total_bayar" id="total_bayar" value="{{$nominal_tunggak}}">
                                    </div>
                                    <div class="form-group">
                                        <p>Upload Bukti Pembayaran</p>
                                        <input type="file" class="form-control" name="file" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-5">
                                <div class="col-auto">
                                    <button class="btn btn-info" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        @endif       
    </div>
    <?php
        function rupiah($angka){
            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah;
        }
    ?>
@endsection

@section('script')
    <script>

        $(".checkBayaran").change(function() {
            if(this.checked) {
                totalBayar = parseInt($(this).data('harga')) + parseInt($('#total_bayar').val());
                $('#total_bayar').val(totalBayar);
                sisaBayar = parseInt($('#sisa_bayar').val()) - parseInt($(this).data('harga'));
                $('#sisa_bayar').val(sisaBayar);
            }else{
                totalBayar = parseInt($('#total_bayar').val()) - parseInt($(this).data('harga'));
                $('#total_bayar').val(totalBayar);
                sisaBayar = parseInt($(this).data('harga')) + parseInt($('#sisa_bayar').val());
                $('#sisa_bayar').val(sisaBayar);
            }
        });
    </script>
@endsection