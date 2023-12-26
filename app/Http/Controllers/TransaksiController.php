<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index() 
    {
    $trans = Transaksi::all(); // Retrieve all posts
    return response()->json(['data' => $trans]);

    // $results = DB::select('CALL GetTransactionDetails()');
    // return view('transactions.index', ['results' => $results]);
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([

        'idCust' => 'required|int',
        'idAset' => 'required|int',
        'waktu_awal' => 'required|string',
        'waktu_akhir' => 'required|string',
        'jaminan' => 'required|string',
        'dp' => 'int',
        'total_bayar' => 'required|int',
        'bukti_jaminan' => 'required|string',
        'bukti_bayar' => 'required|string',
        'status' => 'required|int',
    ]);

    $trans = Transaksi::create($validatedData);

    return response()->json(['message' => 'Trans created successfully', 'data' => $trans], 201);
    }   

    public function update(Request $request, $idTrans)
{
    $trans = Transaksi::find($idTrans);

    if (!$trans) {
        return response()->json(['message' => 'Trans not found'], 404);
    }

    $validatedData = $request->validate([
        'idCust' => 'int',
        'idAset' => 'int',
        'waktu_awal' => 'string',
        'waktu_akhir' => 'string',
        'jaminan' => 'string',
        'dp' => 'int',
        'total_bayar' => 'int',
        'bukti_jaminan' => 'string',
        'bukti_bayar' => 'string',
        'status' => 'string',
    ]);

    $trans->update($validatedData);

    return response()->json(['message' => 'Trans updated successfully', 'data' => $trans]);
}

public function destroy($idTrans)
{
    $trans = Transaksi::find($idTrans);

    if (!$trans) {
        return response()->json(['message' => 'Trans not found'], 404);
    }else{
        return response()->json(['message' => 'Trans deleted'], 201);
    }

    $trans->delete();

}
}
