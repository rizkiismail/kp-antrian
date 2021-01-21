<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Redirect;
use Session;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\BagianModel;
use App\Models\AntrianModel;

class Admin_Controller extends BaseController
{
    public function __construct()
    {
        $this->Authorization();
    }

    public function main(){
        $bagian = BagianModel::all();

        $data['bagian'] = $bagian;
        return view('Dashboard/Admin/main',$data);
    }

    public function list(){
        $admin = AdminModel::all();

        $data['admin'] = $admin;
        return view('Dashboard/Admin/list',$data);
    }

    public function historyAntrian($bagian_id){
        $where = array(
            array('antrian.bagian_id', '=', $bagian_id),
        );
        $antrian = AntrianModel::
        join('bagian', 'bagian.bagian_id', '=', 'antrian.bagian_id')
        ->select('antrian.*', 'bagian.name as bagian')
        ->where($where)->get();
        
        $data['antrian'] = $antrian;
        return view('Dashboard/Admin/history_list',$data);
    }

    public function editBagian($bagian_id){
        $where = array(
            array('bagian_id', '=', $bagian_id),
        );
        $bagian = BagianModel::where($where)->first();

        $data['bagian'] = $bagian;
        return view('Dashboard/Admin/form_edit_bagian',$data);
    }

    public function edit_bagian($bagian_id, Request $request){
        $bagian = BagianModel::find($bagian_id);
        $bagian->name = $request->name;
        $bagian->save();

        return redirect('adminDashboard')->with('msg', 'Berhasil Edit data!');
    }

    public function edit_admin($admin_id){
        $where = array(
            array('admin_id', '=', $admin_id),
        );
        $admin = AdminModel::where($where)->first();

        $data['admin'] = $admin;
        return view('Dashboard/Admin/form_edit_admin',$data);
    }

    public function edit_admin_execute($id,Request $request){
        $admin = AdminModel::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        if($request->password){
            $admin->password = sha1($request->password);
        }
        $admin->save();

        return redirect('admin_list')->with('msg', 'Berhasil Edit data!');
    }

    public function formAddBagian(){
        return view('Dashboard/Admin/form_add_bagian');
    }

    public function formAddAdmin(){
        return view('Dashboard/Admin/form_add_admin');
    }

    public function tambah_admin(Request $request){
        //get input
        $admin =  new AdminModel;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = sha1($request->password);
        $admin->save();

        return redirect('admin_list')->with('msg', 'Berhasil Memasukan data!');
    }

    public function tambah_layanan(Request $request){
        //get input
        $bagian =  new BagianModel;
        $bagian->name = $request->name;
        $bagian->status = 'break';
        $bagian->save();

        return redirect('adminDashboard')->with('msg', 'Berhasil Memasukan data!');
    }

    public function edit_user($nim){
        $whereUser = array(
            array('nim', '=', $nim),
        );
        $user = UserModel::where($whereUser)->first();

        $data['user'] = $user;

        return view('Dashboard/Admin/form_edit_user',$data);
    }

    public function delete_bagian($bagian_id){
        $bagian = BagianModel::find($bagian_id);
        $bagian->delete();

        return redirect('adminDashboard')->with('msg', 'Berhasil mengahapus data!');
    }

    private function Authorization(){
        if (!session('is_admin') || !Session::has('is_admin')) {
            Redirect::to('admin')->send();
        }
    }
}
