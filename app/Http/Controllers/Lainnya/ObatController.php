<?php

namespace App\Http\Controllers\Lainnya;

use App\Obat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Helpers\FunctionHelper;
class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = FunctionHelper::callMenu();

        $obat = DB::table('obat')->get();
        return view('lainnya.obat', ['obat' => $obat, 'menus' => $menus]);
        // return $obat;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $d = new Obat();
        // $d->nama_obat = $request->nama_obat;
        // $d->dosis_obat = $request->dosis_obat;
        // $d->harga_obat = $request->harga_obat;
        // $d->jenis_obat = $request->jenis_obat;
        // $d->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d = new Obat();
        $d->nama_obat = $request->nama_obat;
        $d->dosis_obat = $request->dosis_obat;
        $d->harga_obat = $request->harga_obat;
        $d->jenis_obat = $request->jenis_obat;
        $d->save();

        return response()->json([
            'data' => $d
        ]);
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
