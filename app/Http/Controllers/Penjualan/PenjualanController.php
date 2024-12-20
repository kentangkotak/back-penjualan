<?php

namespace App\Http\Controllers\Penjualan;

use App\Http\Controllers\Controller;
use App\Models\Penjualan\PenjualanH;
use App\Models\Penjualan\PenjualanR;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function simpan(Request $request)
    {
        if($request->notrans === "" || $request->notrans === null)
        {
            $notrans = date('YmdHis').'-KS';

            $simpanh = PenjualanH::create(
                [
                    'notrans' => $notrans,
                    'tgl' => date('Y-m-d H:i:s'),
                    'pelanggan' => $request->namapelanggan,
                    'user' => 'sa'
                ]
            );

            $simpanr = PenjualanR::create(
                [
                    'notrans' => $notrans,
                    'kdbarang' => $request->kode,
                    'jumlah' => $request->jumlah,
                    'harga' => $request->harga,
                ]
            );

            $query = PenjualanH::with(
                [
                    'rincis'
                ]
            )->where('notrans', $notrans)->orderBy('id','Desc')->limit(1)->get();
            return new JsonResponse(
                [
                    'message' => 'Data Berhasil Disimpan',
                    'result' =>  $query
                ]
            );
        }else{
            $notrans = $request->notrans;

            $simpanr = PenjualanR::create(
                [
                    'notrans' => $notrans,
                    'kdbarang' => $request->kode,
                    'jumlah' => $request->jumlah,
                    'harga' => $request->harga,
                ]
            );
            $query = PenjualanH::with(
                [
                    'rincis'
                ]
            )->where('notrans', $notrans)->orderBy('Desc')->limit(1)->get();
            return new JsonResponse(
                [
                    'message' => 'Data Berhasil Disimpan',
                    'result' =>  $query
                ]
            );
        }

    }
}
