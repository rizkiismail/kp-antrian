<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Redirect;
use Session;
use Illuminate\Http\Request;
use App\Models\MahasiswaModel;
use App\Models\AntrianModel;
use App\Models\BagianModel;

class Landing extends BaseController
{
    public function __construct()
    {
        // $this->Authorization();
    }

    public function index(){
        $antrian = false;
        $tunggu = 0;

        if (session('is_member') || Session::has('is_member')) {
            $where = array(
                array('antrian.nim', '=', session('nim')),
                array('antrian.status', '=', 'tunggu')
            );
            $antrian = AntrianModel::join('mahasiswa', 'mahasiswa.nim', '=', 'antrian.nim')
            ->join('bagian', 'bagian.bagian_id', '=', 'antrian.bagian_id')
            ->select('antrian.*', 'mahasiswa.name', 'bagian.name as bagian')
            ->where($where)
            ->get();

            if(count($antrian) > 0){
                $where = array(
                    array('status', '=', 'tunggu'),
                    array('bagian_id', '=', $antrian[0]->bagian_id),
                    array('no_antrian', '<', $antrian[0]->no_antrian)
                );
                $tunggu = AntrianModel::
                where($where)
                ->count();
            }
        }

        $data['antrian'] = $antrian;
        $data['tunggu'] = $tunggu;
        
        return view('landing',$data);
    }

    function getAntrian($bagian_id){
        $where = array(
            array('bagian_id', '=', $bagian_id),
            array('status', '=', 'dipanggil')
        );
        $antrian = AntrianModel::where($where)->get();
        
        if(count($antrian) >= 1){
            echo json_encode(array("result" => $antrian[0]->no_antrian));
        }else{
            echo json_encode(array("result" => 0));;
        }
    }

    function getStatusAntrian($bagian_id){
        $where = array(
            array('bagian_id', '=', $bagian_id)
        );
        $bagian = BagianModel::where($where)->get();
        
        if(count($bagian) >= 1){
            echo json_encode(array("result" => $bagian[0]->status));
        }else{
            echo json_encode(array("result" => "break"));;
        }
    }

    function daftarAntrian($bagian_id){
        $where = array(
            array('bagian_id', '=', $bagian_id),
            array('status', '=', 'tunggu')
        );
        $antrian = AntrianModel::join('mahasiswa', 'mahasiswa.nim', '=', 'antrian.nim')
        ->select('antrian.*', 'mahasiswa.name')
        ->where($where)
        ->orderBy('no_antrian','ASC')
        ->limit(3)
        ->get();
        
        if(count($antrian) >= 1){
            echo json_encode(array("result" => $antrian));
        }else{
            echo json_encode(array("result" => NULL));
        }
    }

    function cekAntrian($antrian_id){
        $where = array(
            array('antrian.antrian_id', '=', $antrian_id)
        );
        $antrian = AntrianModel::join('mahasiswa', 'mahasiswa.nim', '=', 'antrian.nim')
            ->join('bagian', 'bagian.bagian_id', '=', 'antrian.bagian_id')
            ->select('antrian.*', 'mahasiswa.name', 'bagian.name as bagian')
            ->where($where)
            ->get();
            
            $tunggu = 0;
            if(count($antrian) > 0){
                $where = array(
                    array('status', '=', 'tunggu'),
                    array('bagian_id', '=', $antrian[0]->bagian_id),
                    array('no_antrian', '<', $antrian[0]->no_antrian)
                );
                $tunggu = AntrianModel::
                where($where)
                ->count();
                $antrian[0]['tunggu'] = $tunggu;
            }
        
        if(count($antrian) >= 1){
            echo json_encode(array("result" => $antrian[0]));
        }else{
            echo json_encode(array("result" => NULL));
        }
    }
}
