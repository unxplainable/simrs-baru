<?php

namespace App\Http\Controllers\RawatJalan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Pemeriksaan;
use App\RawatJalan;
use App\Helpers\FunctionHelper;
class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = FunctionHelper::callMenu();
        $rawatjalan = DB::table('rawat_jalan')
                        ->join('pasien','rawat_jalan.id_pasien','=','pasien.id')
                        ->join('users','rawat_jalan.id_user', '=', 'users.id')
                        ->join('pemeriksaan','rawat_jalan.id_pemeriksaan','=','pemeriksaan.id')
                        ->join('poli','pemeriksaan.id_poli','=','poli.id')
                        ->join('tindakan','pemeriksaan.id_tindakan','=','tindakan.id')
                        ->join('resep','pemeriksaan.id_resep','=','resep.id')
                        ->select('pasien.*','pemeriksaan.*','users.*','rawat_jalan.*','poli.*','tindakan.*','resep.*')
                        ->get();   
        return view('rawatjalan.pasien',['rawatjalan' => $rawatjalan, 'menus' => $menus]);
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
