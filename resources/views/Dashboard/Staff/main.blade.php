@extends('layouts.staff')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12">
            @if (session('msg'))
                <div class="alert alert-info">
                    {{ session('msg') }}
                </div>
            @endif

            <div class="row mt-3">
                <div class="col-4" style="display: grid;">
                    <div class="card p-3" style="box-shadow: 4px 3px 10px 4px #05050533;">
                        <div class="text-center bg-primary">
                            <p class="mb-0 text-white" style="font-size: 120px" id="antrianUmum">0</p>
                        </div>
                        
                        <h4 class="mt-3">Daftar Antrian Umum</h4>
                        <button class="btn btn-info mb-2" id="antrianStatusUmum">Ready</button>
                        <div id="daftarAntrianUmum"></div>
                        <p>...</p>

                        <div>
                            <a href="{{url('ubahStatusBagian/1/break')}}"><button class="btn btn-danger mt-2">Break</button></a>
                            <a href="{{url('ubahStatusBagian/1/ready')}}"><button class="btn btn-warning mt-2">Ready</button></a>
                            <a href="{{url('nextAntrian/1')}}"><button class="btn btn-success mt-2" id="nextUmum">Next</button></a>
                        </div>
                    </div>
                </div>

                <div class="col-4" style="display: grid;">
                    <div class="card p-3" style="box-shadow: 4px 3px 10px 4px #05050533;">
                        <div class="text-center bg-warning">
                            <p class="mb-0 text-white" style="font-size: 120px" id="antrianKeuangan">0</p>
                        </div>
                        
                        <h4 class="mt-3">Daftar Antrian Keuangan</h4>
                        <button class="btn btn-info mb-2" id="antrianStatusKeuangan">Ready</button>
                        <div id="daftarAntrianKeuangan"></div>
                        <p>...</p>

                        <div>
                            <a href="{{url('ubahStatusBagian/3/break')}}"><button class="btn btn-danger mt-2">Break</button></a>
                            <a href="{{url('ubahStatusBagian/3/ready')}}"><button class="btn btn-warning mt-2">Ready</button></a>
                            <a href="{{url('nextAntrian/3')}}"><button class="btn btn-success mt-2" id="nextKeuangan">Next</button></a>
                        </div>
                    </div>
                </div>

                <div class="col-4" style="display: grid;">
                    <div class="card p-3" style="box-shadow: 4px 3px 10px 4px #05050533;">
                        <div class="text-center bg-success">
                            <p class="mb-0 text-white" style="font-size: 120px" id="antrianJurusan">0</p>
                        </div>
                        
                        <h4 class="mt-3">Daftar Antrian Jurusan</h4>
                        <button class="btn btn-info mb-2" id="antrianStatusJurusan">Ready</button>
                        <div id="daftarAntrianJurusan"></div>
                        <p>...</p>

                        <div>
                            <a href="{{url('ubahStatusBagian/2/break')}}"><button class="btn btn-danger mt-2">Break</button></a>
                            <a href="{{url('ubahStatusBagian/2/ready')}}"><button class="btn btn-warning mt-2">Ready</button></a>
                            <a href="{{url('nextAntrian/2')}}"><button class="btn btn-success mt-2" id="nextJurusan">Next</button></a>
                        </div>
                    </div>
                </div>
            </div> 
            </div>
       </div>     
    </div>
@endsection

@section('script')
    <script>
        $('.tableAngkatan').DataTable( );

        var baseUrl = $('#baseUrl').val();

        $(document).ready(function() {
            // selesai();
        }); update();
        
        function selesai() {
            setTimeout(function() {
                update();
                selesai();
            }, 200);
        }

        function update() {
            $.getJSON(baseUrl + '/getAntrian/1', function(data) {
                $('#antrianUmum').html(data.result);
            });

            $.getJSON(baseUrl + '/getAntrian/3', function(data) {
                $('#antrianKeuangan').html(data.result);
            });

            $.getJSON(baseUrl + '/getAntrian/2', function(data) {
                $('#antrianJurusan').html(data.result);
            });

            $.getJSON(baseUrl + '/getStatusAntrian/1', function(data) {
                if(data.result == "break"){
                    $('#nextUmum').prop('disabled', true);
                }else{
                    $('#nextUmum').prop('disabled', false);
                }

                $('#antrianStatusUmum').html(data.result);
            });

            $.getJSON(baseUrl + '/getStatusAntrian/3', function(data) {
                if(data.result == "break"){
                    $('#nextKeuangan').prop('disabled', true);
                }else{
                    $('#nextKeuangan').prop('disabled', false);
                }

                $('#antrianStatusKeuangan').html(data.result);
            });

            $.getJSON(baseUrl + '/getStatusAntrian/2', function(data) {
                if(data.result == "break"){
                    $('#nextJurusan').prop('disabled', true);
                }else{
                    $('#nextJurusan').prop('disabled', false);
                }

                $('#antrianStatusJurusan').html(data.result);
            });

            $.getJSON(baseUrl + '/daftarAntrian/1', function(data) {
                hasil = "";
                $.each(data.result, function() {
                    hasil += "<p>" + this['no_antrian'] + ". " + this['name'] +"</p>";
                });
                $('#daftarAntrianUmum').html(hasil);
            });

            $.getJSON(baseUrl + '/daftarAntrian/3', function(data) {
                hasil = "";
                $.each(data.result, function() {
                    hasil += "<p>" + this['no_antrian'] + ". " + this['name'] +"</p>";
                });
                $('#daftarAntrianKeuangan').html(hasil);
            });

            $.getJSON(baseUrl + '/daftarAntrian/2', function(data) {
                hasil = "";
                $.each(data.result, function() {
                    hasil += "<p>" + this['no_antrian'] + ". " + this['name'] +"</p>";
                });
                $('#daftarAntrianJurusan').html(hasil);
            });

            if($('#antrianMahasiswa').val() == "true"){
                antrian_id = $('#antrianMahasiswaId').val();
                $.getJSON(baseUrl + '/cekAntrian/' + antrian_id, function(data) {
                    $('#nameMahasiswa').html(data.result.name);
                    $('#statusAntrian').html(data.result.status);
                    $('#bagianAntrian').html("Antrian " + data.result.bagian);
                    $('#tungguAntrian').html("Menunggu " + data.result.tunggu + " antrian");
                });
            }
        }
    </script>
@endsection    