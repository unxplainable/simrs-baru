<?php

namespace App\Http\Controllers\Keuangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\PemeriksaanHarian;
use App\RawatInap;
use App\Ruang;
use App\User;
use App\Helpers\FunctionHelper;
class TransaksiInapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $menus = FunctionHelper::callMenu();
        $transaksiinap = DB::table('transaksi_inap')
                        ->join('users','transaksi_inap.id_petugas', '=', 'users.id')
                        ->join('rawat_inap','transaksi_inap.id_rawat_inap','=','rawat_inap.id')
                        ->join('pasien','rawat_inap.id_pasien','=','pasien.id')
                        ->join('ruang','rawat_inap.id_ruang','=','ruang.id')
                        ->join('pemeriksaan_harian','rawat_inap.id_pemeriksaanharian','=','pemeriksaan_harian.id')
                        ->select('pasien.*','pemeriksaan_harian.*','users.*','rawat_inap.*','ruang.*')
                        ->get();   
        return view('keuangan.transaksiinap',['transaksiinap' => $transaksiinap, 'menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
