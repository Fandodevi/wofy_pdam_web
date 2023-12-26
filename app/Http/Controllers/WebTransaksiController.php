<?php

namespace App\Http\Controllers;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebTransaksiController extends Controller
{


    public function index(Request $request)
{
    // $data = order::orderByDesc('created_at')->get();

    // return view('transaksi', compact('data'));

    if($request->has('search')){
        $data = order::where('name', 'LIKE', '%'.$request->search.'%')->paginate(5);
    }else{
    $data = order::paginate(5); }
    return view('transaksi', compact('data'));
}

// public function insertOrder(Request $request){
//     $validatedData = $request->validate([
//         'customer_id' => 'required|numeric',
//         'name' => 'required|string|max:100',
//         'number' => 'required|string|max:50',
//         'email' => 'required|string|email|max:50',
//         'method' => 'required|string|max:50',
//         'address' => 'required|string|max:100',
//         'total_products' => 'required|string|max:50',
//         'total_price' => 'required|integer',
//         'event_time' => 'required|date',
//         'order_status' => 'nullable|string|max:255',
//         'proof_payment' => 'nullable|string|max:255',
//         'payment_status' => 'nullable|string|max:255',
//     ]);

//     $data = order::create($validatedData);
//     return response()->json(['message' => 'Order berhasil ditambahkan.', 'order' => $data]);
// }

// public function prosedur(Request $request)
// {
// $data = DB::select('CALL GetTransactionDetails()');

// $searchTerm = $request->search;

// $data = array_filter($data, function($item) use ($searchTerm) {
//     return strpos($item->namaCust, $searchTerm) !== false || strpos($item->nama_aset, $searchTerm) !== false
//     || strpos($item->status, $searchTerm) !== false;
// });

// $data = array_slice($data, 0, 5);

// $data = new \Illuminate\Pagination\LengthAwarePaginator($data, count($data), 5);

// return view('transaksi', ['data' => $data]);
// }

// if($request->has('search')){
//     $results = Transaksi::where('namaCust', 'LIKE', '%'.$request->search.'%');
// }else{
// $results = DB::select('CALL GetTransactionDetails()');}
// return view('transaksi', compact('results'));

// if ($request->has('search')) {
//     $data = Aset::where(function($query) use ($request) {
//         $query->where('nama_aset', 'LIKE', '%' . $request->search . '%')
//               ->orWhere('alamat_aset', 'LIKE', '%' . $request->search . '%');
//     })->paginate(5);
// } else {
//     $data = DB::select('CALL GetAsetData()');
// }

// return view('aset', compact('data'));
}
