<?php

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

Auth::routes();

Route::middleware(['guest'])->group(function () {
Route::get('/', 'Dashboard\DashboardController@index');

  // modul dashboard
  Route::get('dashboard', 'Dashboard\DashboardController@index')->name('hello');

  // modul pendaftaran
  Route::get('pendaftaran', 'Pendaftaran\PendaftaranController@index');
  Route::post('add-pendaftaran', 'Pendaftaran\PendaftaranController@store')->name('pendaftaran.addPendaftaran');
  Route::post('edit-pendaftaran', 'Pendaftaran\PendaftaranController@updateData')->name('pendaftaran.editPendaftaran');
  Route::get('pendaftaran-json', 'Pendaftaran\PendaftaranController@pendaftaranJSON')->name('pendaftaran.dataJSON');
  Route::get('deletePendaftaran', 'Pendaftaran\PendaftaranController@destroy')->name('pendaftaran.delete');

  // modul pasien
  Route::get('pasien', 'Pasien\PasienController@index');
  Route::get('pasien-json', 'Pasien\PasienController@pasienJSON')->name('pasien.dataJSON');
  Route::post('edit-pasien', 'Pasien\PasienController@updateData')->name('pasien.editPasien');
  Route::get('deletePasien', 'Pasien\PasienController@destroy')->name('pasien.delete');

  // modul rawat inap
  Route::get('pasien-rawat-json', 'RawatInap\PasienRawatController@pasienRawatJSON')->name('pasienRawat.dataJSON');
  Route::get('pasien-rawat', 'RawatInap\PasienRawatController@index');
  Route::get('pasien-rawat/autocomplete', 'RawatInap\PasienRawatController@autoComplete')->name('pasienRawat.autoComplete');
  Route::get('pasien-rawat-delete', 'RawatInap\PasienRawatController@destroy')->name('pasienRawat.delete');
  Route::get('pasien-keluar', 'RawatInap\PasienKeluarController@index');

  Route::get('ruang', 'RawatInap\RuangController@index');
  Route::post('add-ruang', 'RawatInap\RuangController@store')->name('ruang.addRuang');
  Route::post('edit-ruang', 'RawatInap\RuangController@updateData')->name('ruang.editRuang');
  Route::get('ruang-json', 'RawatInap\RuangController@ruangJSON')->name('ruang.dataJSON');
  Route::get('deleteRuang', 'RawatInap\RuangController@destroy')->name('ruang.delete');

  Route::get('pemeriksaan-harian', 'RawatInap\PemeriksaanHarianController@index');

  // modul rawat jalan
  Route::get('rawat-jalan/pasien', 'RawatJalan\PasienController@index');

  Route::get('rawat-jalan/tindakan', 'RawatJalan\TindakanController@index');

  // modul keuangan
  Route::get('transaksi-inap', 'Keuangan\TransaksiInapController@index');

  Route::get('transaksi-jalan', 'Keuangan\TransaksiJalanController@index');
  Route::get('transaksi-jalan-json', 'Keuangan\TransaksiJalanController@transaksiJSON')->name('transaksijalan.dataJSON');
  Route::post('edit-transaksi-jalan', 'Keuangan\TransaksiJalanController@updateData')->name('keuangan.editTransaksiJalan');
  // modul lainnya
  Route::get('penyakit', 'Lainnya\PenyakitController@index');
  Route::post('add-penyakit', 'Lainnya\PenyakitController@store')->name('penyakit.addPenyakit');
  Route::get('penyakit-json', 'Lainnya\PenyakitController@penyakitJSON')->name('penyakit.dataJSON');
  Route::get('deletePenyakit', 'Lainnya\PenyakitController@destroy')->name('penyakit.delete');
  Route::post('edit-penyakit', 'Lainnya\PenyakitController@update')->name('penyakit.editPenyakit');

  // Route::get('penyakit', 'Lainnya\PenyakitController@index');

  // Route::post('penyakit', 'Lainnya\PenyakitController@store');

  Route::get('obat', 'Lainnya\ObatController@index');
  Route::post('add-obat', 'Lainnya\ObatController@store')->name('obat.addObat');
  Route::get('obat-json', 'Lainnya\ObatController@obatJSON')->name('obat.dataJSON');
  Route::get('deleteObat', 'Lainnya\ObatController@destroy')->name('obat.delete');
  Route::post('edit-obat', 'Lainnya\ObatController@update')->name('obat.editObat');
  
  

  Route::get('resep', 'Lainnya\ResepController@index');

  // modul setting
  Route::get('role', 'Setting\RoleController@index');

  Route::get('user-json', 'Setting\UserController@userJson')->name('user.dataJSON');
  Route::get('user', 'Setting\UserController@index')->name('user.index');
  Route::post('user', 'Setting\UserController@store')->name('user.add');
  Route::post('user/{id}', 'Setting\UserController@update')->name('user.edit');
  Route::delete('user/delete', 'Setting\UserController@destroy')->name('user.delete');

  Route::get('edit-password-json', 'Setting\EditPasswordController@passwordJson')->name('password.dataJSON');
  Route::get('edit-password', 'Setting\EditPasswordController@index');

  Route::get('profile', 'Setting\ProfileController@index');
});
