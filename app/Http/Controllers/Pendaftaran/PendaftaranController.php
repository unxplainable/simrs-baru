<?php

namespace App\Http\Controllers\Pendaftaran;

use Illuminate\Http\Request;
use App\Pasien;
use App\Daftar;
use App\RolePembayaran;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Helpers\FunctionHelper;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = FunctionHelper::callMenu();

        $daftar = DB::table('daftar')
                       ->join('poli','daftar.id_poli','=','poli.id')
                       ->join('role_pembayaran','daftar.id_role_pembayaran', '=', 'role_pembayaran.id')
                       ->join('pasien','daftar.id_pasien','=','pasien.id')
                       ->select('daftar.id as id_daftar','poli.*','role_pembayaran.*','pasien.*')
                       ->get();
                        
        return view('pendaftaran.pendaftaran',['daftar' => $daftar, 'menus' => $menus]);
        // return $daftar;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        

        $d = new Pasien();
        $d->nama_pasien = $request->nama_pasien;
        $d->jenis_kelamin = $request->jenis_kelamin;
        $d->alamat = $request->alamat;
        $d->pekerjaan = $request->pekerjaan;
        $d->desa = $request->desa;
        $d->kecamatan = $request->kecamatan;
        $d->kabupaten = $request->kabupaten;
        $d->provinsi = $request->provinsi;
        $d->agama = $request->agama;
        $d->golongan_darah = $request->golongan_darah;
        $d->pendidikan = $request->golongan_darah;
        $d->tempat_lahir = $request->tempat_lahir;
        $d->umur = $request->umur;
        $d->tanggal_lahir = $request->tanggal_lahir;
        $d->save();

        $e = DB::table('pasien')->get();


        foreach($e as $data){
            $c = new Daftar();
            $c->id_pasien = $data->id;          
        }
        $c->id_poli = $request->id_poli;
        $c->id_role_pembayaran = $request->id_role_pembayaran;
        $c->save();

        return response()->json([
            'data' => $d.$c,
            'success' => 'Created succesfully!'
        ],);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "bangsat store";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "bangsat show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "bangsat edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo "bangsat update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $data = Daftar::find($id);
        $data->delete();
        return Redirect::back();
    }
}
