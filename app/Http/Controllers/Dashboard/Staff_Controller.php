<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Redirect;
use Session;
use Illuminate\Http\Request;
use App\Models\StaffModel;
use App\Models\BagianModel;
use App\Models\AntrianModel;

class Staff_Controller extends BaseController
{
    public function __construct()
    {
        $this->Authorization();
    }

    public function main(){
        return view('Dashboard/Staff/main');
    }

    public function list(){
        $staff = StaffModel::all();

        $data['staff'] = $staff;
        return view('Dashboard/Staff/list',$data);
    }

    public function formAddStaff(){
        return view('Dashboard/Staff/form_add_staff');
    }

    public function tambah_staff(Request $request){
        //get input
        $staff =  new StaffModel;
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->password = sha1($request->password);
        $staff->save();

        return redirect('staff_list')->with('msg', 'Berhasil Memasukan data!');
    }

    public function edit_staff($staff_id){
        $where = array(
            array('staff_id', '=', $staff_id),
        );
        $staff = StaffModel::where($where)->first();

        $data['staff'] = $staff;
        return view('Dashboard/Staff/form_edit_staff',$data);
    }

    public function edit_staff_execute($id,Request $request){
        $staff = StaffModel::find($id);
        $staff->name = $request->name;
        $staff->email = $request->email;
        if($request->password){
            $staff->password = sha1($request->password);
        }
        $staff->save();

        return redirect('staff_list')->with('msg', 'Berhasil Edit data!');
    }

    public function break_bagian($bagian_id,$status){
        $bagian = BagianModel::find($bagian_id);
        $bagian->status = $status;
        $bagian->save();

        return redirect('staffDashboard')->with('msg', 'Berhasil mengubah status layanan!');
    }

    public function next_antrian($bagian_id){
        $where = array(
            array('bagian_id', '=', $bagian_id),
            array('status', '=', 'tunggu'),
            
        );
        $bagian = AntrianModel::where($where)->orderBy('no_antrian','ASC')->get();

        if(count($bagian) <= 0){
            return redirect('staffDashboard')->with('msg', 'Tidak ada antrian menunggu!');
        }else{
            $where = array(
                array('bagian_id', '=', $bagian_id),
                array('status', '=', 'dipanggil'),
                
            );
            $bagianSelesai = AntrianModel::where($where)->get();

            if(count($bagianSelesai) > 0){
                $bagianUpdate = AntrianModel::find($bagianSelesai[0]->antrian_id);
                $bagianUpdate->status = 'selesai';
                $bagianUpdate->save();
            }

            $bagianUpdate = AntrianModel::find($bagian[0]->antrian_id);
            $bagianUpdate->status = 'dipanggil';
            $bagianUpdate->save();

            return redirect('staffDashboard')->with('msg', 'Berhasil mengubah data!');
        }
    }

    private function Authorization(){
        if (!session('is_staff') || !Session::has('is_staff')) {
            Redirect::to('staff')->send();
        }
    }
}
