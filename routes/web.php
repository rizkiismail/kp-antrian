<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Landing@index');

//Login Register
Route::get('/login', 'Auth\Auth_Controller@login');
Route::get('/admin', 'Auth\Auth_Controller@admin');
Route::get('/staff', 'Auth\Auth_Controller@staff');
Route::get('/register', 'Auth\Auth_Controller@register');
Route::get('/logout', 'Auth\Auth_Controller@logout');
Route::get('/logout_cek', 'Auth\Auth_Controller@logout_cek');
Route::get('/logout_admin', 'Auth\Auth_Controller@logout_admin');
Route::get('/logout_staff', 'Auth\Auth_Controller@logout_staff');
Route::post('/register/execute', 'Auth\Auth_Controller@register_execute');
Route::post('/login/execute', 'Auth\Auth_Controller@login_execute');
Route::post('/login_admin/execute', 'Auth\Auth_Controller@login_admin_execute');
Route::post('/login_staff/execute', 'Auth\Auth_Controller@login_staff_execute');

//Dashboard User
Route::post('/daftarAntrian/{bagian_id}', 'Dashboard\User_Controller@daftarAntrian');
Route::get('/getAntrian/{bagian_id}', 'Landing@getAntrian');
Route::get('/getStatusAntrian/{bagian_id}', 'Landing@getStatusAntrian');
Route::get('/daftarAntrian/{bagian_id}', 'Landing@daftarAntrian');
Route::get('/cekAntrian/{antrian_id}', 'Landing@cekAntrian');

//Dashboard Admin
Route::get('/admin_list', 'Dashboard\Admin_Controller@list');
Route::get('/edit_admin/{admin_id}', 'Dashboard\Admin_Controller@edit_admin');
Route::get('/adminDashboard', 'Dashboard\Admin_Controller@main');
Route::get('/historyAntrian/{bagian_id}', 'Dashboard\Admin_Controller@historyAntrian');
Route::get('/admin/addBagian', 'Dashboard\Admin_Controller@formAddBagian');
Route::get('/admin/addAdmin', 'Dashboard\Admin_Controller@formAddAdmin');
Route::get('/bagianEdit/{bagian_id}', 'Dashboard\Admin_Controller@editBagian');
Route::get('/deleteBagian/{bagain_id}', 'Dashboard\Admin_Controller@delete_bagian');
Route::post('/edit_admin_execute/{id}', 'Dashboard\Admin_Controller@edit_admin_execute');
Route::post('/edit_bagian/{bagian_id}', 'Dashboard\Admin_Controller@edit_bagian');
Route::post('/tambah_admin', 'Dashboard\Admin_Controller@tambah_admin');
Route::post('/tambah_layanan', 'Dashboard\Admin_Controller@tambah_layanan');

//Dashboard Staff
Route::get('/staffDashboard', 'Dashboard\Staff_Controller@main');
Route::get('/staff_list', 'Dashboard\Staff_Controller@list');
Route::get('/edit_staff/{staff_id}', 'Dashboard\Staff_Controller@edit_staff');
Route::get('/staff/addStaff', 'Dashboard\Staff_Controller@formAddStaff');
Route::post('/tambah_staff', 'Dashboard\Staff_Controller@tambah_staff');
Route::get('/edit_staff/{staff_id}', 'Dashboard\Staff_Controller@edit_staff');
Route::post('/edit_staff_execute/{id}', 'Dashboard\Staff_Controller@edit_staff_execute');
Route::get('/ubahStatusBagian/{bagian_id}/{status}', 'Dashboard\Staff_Controller@break_bagian');
Route::get('/nextAntrian/{bagian_id}', 'Dashboard\Staff_Controller@next_antrian');