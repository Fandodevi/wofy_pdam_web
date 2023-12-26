<?php

namespace App\Http\Controllers;
use App\Models\Aset;
use App\Models\Like;
use App\Models\kategori;
use App\Models\Keranjang;
use App\Models\customer;
use App\Models\DetileJual;
use App\Models\Jual;
use App\Models\Paymen;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AsetController extends Controller
{
    public function index() 
    {
    $asets = Aset::all(); // Retrieve all posts
    return response()->json(['data' => $asets]);
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'jual.total' => 'required',
            'jual.total_final' => 'required',
            'jual.alamat' => 'required',
            'jual.nohp' => 'required',
            'jual.nama_lengkap' => 'required',
            'detil_jual' => 'required|array',
            'detil_jual.*.id_keranjang' => 'required',
            'detil_jual.*.id_jual' => 'required',
            'detil_jual.*.jumlah' => 'required',
            'detil_jual.*.harga' => 'required',
            'detil_jual.*.qty' => 'required',
            'jual.bukti_bayar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk bukti bayar
        ]);
    
        // Decode JSON input
        $data = json_decode($request->getContent(), true);
    
        // Simpan data transaksi jual
        $jualData = $data['jual'];
        $jualData['status'] = 'pending'; // Atur status menjadi 'pending'
        $jual = Jual::create($jualData);
    
        // Cek jika ada file bukti bayar yang diunggah
        if ($request->hasFile('jual.bukti_bayar')) {
            $buktiBayar = $request->file('jual.bukti_bayar');
            $buktiBayarPath = $buktiBayar->store('bukti_bayar', 'public');
            $jual->bukti_bayar = $buktiBayarPath;
            $jual->save();
        }
    
        // Simpan detail transaksi jual
        $detilJualData = [];
        foreach ($data['detil_jual'] as $detil) {
            $detilJualData[] = new DetileJual([
                'id_jual' => $detil['id_jual'],
                'id_keranjang' => $detil['id_keranjang'],
                'jumlah' => $detil['jumlah'],
                'harga' => $detil['harga'],
                'qty' => $detil['qty'],
            ]);
        }
        $jual->detilJual()->saveMany($detilJualData);
    
        // Response sukses
        return response()->json(['message' => 'Data transaksi jual berhasil disimpan'], 200);
    }   

    public function update(Request $request, $idAset)
{
    $asets = Aset::find($idAset);

    if (!$asets) {
        return response()->json(['message' => 'Aset not found'], 404);
    }

    $validatedData = $request->validate([
        'nama_aset' => 'string',
        'alamat_aset' => 'string',
        'tipe' => 'int',
        'harga' => 'int',
    ]);

    $asets->update($validatedData);

    return response()->json(['message' => 'Aset updated successfully', 'data' => $asets]);
}

public function destroy($idAset)
{
    $asets = Aset::find($idAset);

    if (!$asets) {
        return response()->json(['message' => 'Aset not found'], 404);
    }

    $asets->delete();


}

public function getDataAset(Request $request)
{
    $idCust = $request->input('idCust');

    $asets = Aset::all();

    if ($asets->isEmpty()) {
        return response()->json([
            'success' => false,
            'message' => 'No data found',
            'data' => null
        ]);
    } else {
        $response = $asets->toArray();
        // Fetch the like data for the given customer ID
        $likes = Like::whereIn('idCust', $asets->pluck('idCust'))
                     ->where('idCust', $idCust)
                     ->orderBy('created_at', 'desc')
                     ->get();
        foreach ($response as &$aset) {
            // Check if 'idCust' exists in the $aset array before accessing it
            if (array_key_exists('idCust', $aset)) {
                // Check if 'idCust' exists in the $likes collection
                $aset['is_liked'] = $likes->contains('idCust', $aset['idCust']);
                
                // Access the image property directly on the $aset object
                $aset['gambar'] = $aset['image']; // Replace 'image' with your actual image field name
            } else {
                // Handle the case where 'idCust' is not present in the $aset array
                $aset['is_liked'] = false;
            }
        }
    }
    return response()->json($response);
}

public function getDetilAset(Request $request)
    {
        $idAset = $request->input('idAset');
    
        // Mencari barang berdasarkan id_barang
        $asets = aset::find($idAset);
    
        if (!$asets) {
            $response = array(
                'success' => false,
                'message' => 'No data found',
                'data' => null
            );
        } else {
            $response = $asets->toArray();
    
            // Mengambil data like untuk id_barang yang diberikan
            $likes = Like::where('idAset', $idAset)->get();
    
            // Menambahkan status like pada response barang
            $response['is_liked'] = !$likes->isEmpty();
        }
    
        return response()->json($response);
    }

        public function storeDetil(Request $request)
    {
        // Validasi data input
        $request->validate([
            'id_jual' => 'required',
            'id_keranjang' => 'required',
            'idAset' => 'required',
            'jumlah' => 'required',
            'qty' => 'required',
            'harga' => 'required',
            'total_final' => 'required'
        ]);

        // Simpan data detil jual
        $detilJualData = [
            'id_jual' => $request->input('id_jual'),
            'id_keranjang' => $request->input('id_keranjang'),
            'idAset' => $request->input('idAset'),
            'jumlah' => $request->input('jumlah'),
            'qty' => $request->input('qty'),
            'harga' => $request->input('harga'),
            'total_final' => $request->input('total_final')
        ];

        $detilJual = DetileJual::create($detilJualData);

        // Response sukses
        return response()->json($detilJual, 200);
    }
    
    public function getDataKeranjang(Request $request)
    {
        $data = $request->validate([
            'idCust' => 'required',
        ]);  
    
        $keranjang = Keranjang::join('asets', 'keranjang.idAset', '=', 'asets.idAset')
            ->where('keranjang.idCust', $data['idCust'])
            ->where('keranjang.status','belum')
            ->select('keranjang.*', 'asets.harga', 'asets.gambar', 'asets.nama_aset')
            ->get();
    
        if ($keranjang->isEmpty()) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }
    
        foreach ($keranjang as $item) {
            $item->jumlah = $item->harga * $item->qty;
        }
    
        return response()->json($keranjang, 200);
    }

    public function addDataKeranjang(Request $request)
    {
        $data = $request->only(['idCust', 'idAset']);
    
        // Check if required fields are present
        $requiredFields = ['idCust', 'idAset'];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                return response()->json([
                    'error' => 'The ' . $field . ' field is required.'
                ], 400);
            }
        }
    
        $keranjang = Keranjang::create($data);
    
        return response()->json([
            'message' => 'Data added successfully',
            'data' => $keranjang
        ], 200);
    }


    public function getTotalKeranjang(Request $request)
    {
        $data = $request->validate([
            'idCust' => 'required',
        ]);  
    
        $keranjang = Keranjang::join('asets', 'keranjang.idAset', '=', 'asets.idAset')
            ->where('keranjang.idCust', $data['idCust'])
            ->where('keranjang.status', 'belum')
            ->select('keranjang.*', 'asets.harga', 'asets.gambar', 'asets.nama_aset')
            ->get();
    
        if ($keranjang->isEmpty()) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }
    
        $totalJumlah = 0;
        foreach ($keranjang as $item) {
            $jumlah = $item->harga * $item->qty;
            $item->jumlah = $jumlah;
            $totalJumlah += $jumlah;

        }
    
        return response()->json([
         "jumlah" =>   $totalJumlah]
        , 200);
    }

        public function updateDataKeranjang(Request $request)
    {
        $data = $request->only(['id_keranjang']);

        // Check if required fields are present
        $requiredFields = ['id_keranjang'];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                return response()->json([
                    'error' => 'The ' . $field . ' field is required.'
                ], 400);
            }
        }

        // Find the Keranjang by id_keranjang
        $keranjang = Keranjang::find($data['id_keranjang']);

        if (!$keranjang) {
            return response()->json([
                'error' => 'Keranjang not found.'
            ], 404);
        }

        // Increment qty by 1
        $keranjang->qty += 1;
        $keranjang->save();

        return response()->json(
            $keranjang
        , 200);
    }

    public function getAllPaymen(Request $request)
    {
        try {
            $paymen = Paymen::all();
            return response()->json( $paymen,200
            );
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve paymen data.',
            ], 500);
        }
    }

        public function getDetilJual(Request $request)
    {
        // Validasi data input
        $request->validate([
            'id_jual' => 'required'
        ]);

        $idJual = $request->input('id_jual');

    $detilJual = DetileJual::where('detil_jual.id_jual', $idJual)
        ->join('jual', 'detil_jual.id_jual', '=', 'jual.id_jual')
        ->join('asets', 'detil_jual.idAset', '=', 'asets.idAset')
        ->get();

    return response()->json($detilJual, 200);
    }

        public function getNota(Request $request)
    {
        $request->validate([
            'id_jual' => 'required',
        ]);

        $idJual = $request->input('id_jual');

        // Ambil data penjualan berdasarkan id_jual
        $dataJual = Jual::where('id_jual', $idJual)->first();

        if (!$dataJual) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        // Ambil data detil transaksi berdasarkan id_jual
        $detilJual = DetileJual::where('id_jual', $idJual)->get();

        // Ambil data keranjang dan barang berdasarkan id_keranjang di detil transaksi
        $keranjangIds = $detilJual->pluck('id_keranjang');
        $keranjang = Keranjang::whereIn('id_keranjang', $keranjangIds)->get();
        $barangIds = $keranjang->pluck('idAset');
        $asets = aset::whereIn('idAset', $barangIds)->get();

        // Menggabungkan semua data menjadi satu array
        $data = [
            'jual' => $dataJual->toArray(),
            'detil_jual' => $detilJual->toArray(),
            'keranjang' => $keranjang->toArray(),
            'aset' => $asets->toArray(),
        ];

        return response()->json($data, 200);
    }

        public function updateDataBarang(Request $request)
    {
        $idAset = $request->input('idAset');
        $qty = $request->input('qty');

        $asets = aset::find($idAset);

        if (!$asets) {
            $response = array(
                'success' => false,
                'message' => 'Aset not found',
                'data' => null
            );
            return response()->json($response);
        }

        $jumlah_aset = $aset->jumlah_aset - $qty;
        $aset->jumlah_aset = $jumlah_aset;
        $aset->save();

        $response = 
        $asets;

        return response()->json($response);
    }

    public function storeJual(Request $request)
    {
        // Validasi data input
        $request->validate([
            'total' => 'required',
            'total_final' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'nama_lengkap' => 'required',
            'idCust' => 'required',
            'bukti_bayar' => 'nullable', // Validasi untuk bukti bayar
        ]);

        // Simpan data transaksi jual
        $jualData = [
            
            'total' => $request->input('total'),
            'total_final' => $request->input('total_final'),
            'alamat' => $request->input('alamat'),
            'nohp' => $request->input('nohp'),
            'nama_lengkap' => $request->input('nama_lengkap'),
            'idCust' => $request->input('idCust'),
            'status' => 'belum bayar', // Atur status menjadi 'pending'
        ];

        $jual = Jual::create($jualData);

        // Cek jika ada file bukti bayar yang diunggah
        if ($request->hasFile('bukti_bayar')) {
            $buktiBayar = $request->file('bukti_bayar');
            $buktiBayarPath = $buktiBayar->store('bukti_bayar', 'public');
            $jual->bukti_bayar = $buktiBayarPath;
            $jual->save();
        }

        // Response sukses
        return response()->json($jual, 200);
    }

    public function updateQty(Request $request)
    {
        $data = $request->validate([
            'id_keranjang' => 'required',
        ]);

        $id_keranjang = $data['id_keranjang'];

        // Find the Keranjang by id_keranjang
        $keranjang = Keranjang::find($id_keranjang);

        if (!$keranjang) {
            return response()->json([
                'error' => 'Keranjang not found.'
            ], 404);
        }

        // Decrement qty by 1
        if ($keranjang->qty > 1) {
            $keranjang->qty -= 1;
        } elseif ($keranjang->qty == 1) {
            // Delete the Keranjang if qty is 1
            $keranjang->delete();

            return response()->json([
                
            ], 200);
        } else {
            return response()->json([
                'error' => 'Cannot decrement qty below zero.'
            ], 400);
        }

        $keranjang->save();

        return response()->json($keranjang
        , 200);
    }

    public function updateStatusKeranjang(Request $request)
    {
        $idKeranjang = $request->input('id_keranjang');
    
        if (!$idKeranjang) {
            return response()->json([
                'error' => 'Invalid input: id_keranjang is required',
            ], 400);
        }
    
        $keranjang = Keranjang::find($idKeranjang);
    
        if (!$keranjang) {
            return response()->json([
                'error' => 'Keranjang not found',
            ], 404);
        }
    
        $keranjang->status = 'selesai';
        $keranjang->save();
    
        return response()->json(
             $keranjang
       , 200);
    }

        public function updateJual(Request $request)
    {
        $request->validate([
            'id_jual' => 'required', // Validasi untuk id_jual
            'bukti_bayar' => 'required|file', // Validasi untuk bukti bayar
        ]);

        $id_jual = $request->input('id_jual');
        $jual = Jual::find($id_jual);

        if (!$jual) {
            // Jika transaksi jual tidak ditemukan, berikan respon error
            return response()->json(['message' => 'Transaksi jual tidak ditemukan'], 404);
        }

        if ($request->hasFile('bukti_bayar')) {
            $buktiBayar = $request->file('bukti_bayar');
            $destinationPath = 'storage/gambar-aset/';
            $buktiBayarName = date('YmdHis') . "." . $buktiBayar->getClientOriginalExtension();
            $buktiBayar->move($destinationPath, $buktiBayarName);
            $jual->bukti_bayar = "storage/gambar-aset/" . $buktiBayarName;
        }

        $jual->status = 'Konfirmasi Admin';

        // Simpan perubahan data
        $jual->save();

        return response()->json($jual, 200);
    }

        public function updateKlaim(Request $request)
    {
        $request->validate([
            'id_jual' => 'required', // Validasi untuk id_jual
        ]);

        $id_jual = $request->input('id_jual');
        $jual = Jual::find($id_jual);

        if (!$jual) {
            // Jika transaksi jual tidak ditemukan, berikan respon error
            return response()->json(['message' => 'Transaksi jual tidak ditemukan'], 404);
        }

        $jual->status = 'Selesai';

        // Simpan perubahan data
        $jual->save();

        return response()->json($jual, 200);
    }

    public function getDataJualByCustomer(Request $request)
    {
        // Validasi data input
        $request->validate([
            'idCust' => 'required',
        ]);

        $idCustomer = $request->input('idCust');

        // Ambil data penjualan berdasarkan id_customer
        $dataJual = Jual::where('idCust', $idCustomer)
        ->orderBy('created_at', 'desc')
        ->get();

        if ($dataJual->isEmpty()) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        return response()->json( $dataJual, 200);
    }

    public function showByCustomer(Request $request)
    {
        $idCustomer = $request->input('idCust');
    
        $detileJual = DetileJual::join('keranjang', 'detil_jual.id_keranjang', '=', 'keranjang.id_keranjang')
            ->join('jual', 'keranjang.id_jual', '=', 'jual.id_jual')
            ->join('asets', 'keranjang.idAset', '=', 'asets.idAset')
            ->select('detil_jual.*', 'keranjang.id_keranjang', 'jual.*', 'asets.nama_aset', 'asets.gambar', 'asets.deskripsi')
            ->where('jual.idCust', $idCustomer)
            ->get();
    
        if ($detileJual->isEmpty()) {
            return response()->json(['message' => 'Data not found'], 404);
        }
    
        return response()->json(['data' => $detileJual], 200);
    }

}
