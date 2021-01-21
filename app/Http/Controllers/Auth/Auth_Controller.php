<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\MahasiswaModel;
use App\Models\AdminModel;
use App\Models\StaffModel;
use Illuminate\Routing\Controller as BaseController;
use Session;


class Auth_Controller extends BaseController
{
    public function login(){
        if(session('is_member')){
            return redirect('/')->with('msg', 'Selamat datang '.session('name'));
        }

        return view('Auth/login');
    }

    public function admin(){
        if(session('is_admin')){
            return redirect('adminDashboard')->with('msg', 'Selamat datang '.session('name'));
        }

        return view('Auth/login_admin');
    }

    public function staff(){
        if(session('is_staff')){
            return redirect('staffDashboard')->with('msg', 'Selamat datang '.session('name'));
        }

        return view('Auth/login_staff');
    }

    public function register(){
        return view('Auth/register');
    }

    public function logout(){
        Session::flush();
        return redirect('logout_cek')->with('msg', 'Berhasil keluar!');
    }

    public function logout_cek(){
        if(session('is_member')){
            return redirect('logout');
        }

        return redirect('login');
    }

    public function logout_admin(){
        Session::flush();
        return redirect('admin')->with('msg', 'Berhasil keluar!');
    }

    public function logout_staff(){
        Session::flush();
        return redirect('staff')->with('msg', 'Berhasil keluar!');
    }

    public function register_execute(Request $request){

        $nim = MahasiswaModel::where('nim', '=', $request->nim)->first();
        $email = MahasiswaModel::where('email', '=', $request->email)->first();

        if($nim || $email){
            return redirect('register')->with('msg', 'Gagal nim atau email sudah terdaftar!');
        }

        //get input
        $user =  new MahasiswaModel;
        $user->nim = $request->nim;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = sha1($request->password);
        $user->save();

        return redirect('login')->with('msg', 'Berhasil mendaftar silahkan masuk!');
    }

    public function login_execute(Request $request){
        $where = array(
            array('nim', '=', $request->nim),
            array('password', '=', sha1($request->password))
        );
        $user = MahasiswaModel::where($where)->get();

        if(count($user) <= 0){
            return redirect('login')->with('msg', 'Nim atau password salah!');
        }

        $user = $user[0];

        $data_session = array(
            'name' => $user->name,
            'nim' => $user->nim,
            'is_member' => true,
            'is_login' => true
        );

        session($data_session);

        $session = Session::all();

        return redirect('/')->with('msg', 'Selamat datang '.$user->name);
    }

    public function login_admin_execute(Request $request){
        $where = array(
            array('email', '=', $request->email),
            array('password', '=', sha1($request->password))
        );
        $admin = AdminModel::where($where)->get();

        if(count($admin) <= 0){
            return redirect('admin')->with('msg', 'Email atau password salah!');
        }

        $admin = $admin[0];

        $data_session = array(
            'name' => $admin->name,
            'email' => $admin->email,
            'is_admin' => true,
            'is_login' => true
        );

        session($data_session);

        $session = Session::all();

        return redirect('adminDashboard')->with('msg', 'Selamat datang '.$admin->name);
    }

    public function login_staff_execute(Request $request){
        $where = array(
            array('email', '=', $request->email),
            array('password', '=', sha1($request->password))
        );
        $staff = StaffModel::where($where)->get();

        if(count($staff) <= 0){
            return redirect('staff')->with('msg', 'Email atau password salah!');
        }

        $staff = $staff[0];

        $data_session = array(
            'name' => $staff->name,
            'email' => $staff->email,
            'is_staff' => true,
            'is_login' => true
        );

        session($data_session);

        $session = Session::all();

        return redirect('staffDashboard')->with('msg', 'Selamat datang '.$staff->name);
    }
}
