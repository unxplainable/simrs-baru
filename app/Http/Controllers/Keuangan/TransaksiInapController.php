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

    public function transaksiJSON() {
        $transaksijalan = DB::table('transaksi_poli')
                        ->join('pemeriksaan','transaksi_poli.id_pemeriksaan','=','pemeriksaan.id')
                        ->join('users','transaksi_poli.id_petugas', '=', 'users.id')
                        ->join('pasien','pemeriksaan.id_pasien','=','pasien.id')
                        ->join('poli','pemeriksaan.id_poli','=','poli.id')
                        ->join('tindakan','pemeriksaan.id_tindakan','=','tindakan.id')
                        ->join('resep','pemeriksaan.id_resep', '=', 'resep.id')
                        ->select('transaksi_poli.id as id_transaksi_poli','transaksi_poli.*','pasien.*','pemeriksaan.*','users.*','tindakan.*','poli.*','resep.*')
                        ->get(); 
        $data = [];
        foreach($transaksijalan as $transaksi) {
            $data[] = [
                'id' => $transaksi->id_transaksi_poli,
                'nama_pasien' => $transaksi->nama_pasien,
                'nama_tindakan' => $transaksi->nama_tindakan,
                'nama_resep' => $transaksi->nama_resep,
                'total_pembayaran'=> $transaksi ->total_pembayaran,
                'status_pembayaran' => $transaksi->status_pembayaran,
                'nama_user' => $transaksi->nama_user,
            ];
        }
        return Datatables::of($data)
        ->addColumn('action', function ($data){
            return'
                <div class="list-icons">
                    <a href="#" id="'.$data['id'].'" class="dropdown-item edit-transaksi-jalan" data-toggle="modal" data-target="#edit-modal"><button type="button" class="btn btn-primary"> <i class="icon-pencil5 mr-2"></i> Edit </button></a>
                    <a href="#" id="'.$data['id'].'" class="dropdown-item delete-modal" data-toggle="modal" data-target="#delete-modal"><button type="button" class="btn btn-danger"> <i class="icon-trash mr-2"></i> Delete </button></i></a>
                </div>
            ';
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }
    
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
