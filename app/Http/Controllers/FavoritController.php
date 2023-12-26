<?php

namespace App\Http\Controllers;
use App\Models\Keranjang;
use App\Models\Aset;
use App\Models\Like;
use Illuminate\Http\Request;

class FavoritController extends Controller
{
    public function index()
    {
        $asets = Like::all(); // Retrieve all posts
        return response()->json(['data' => $asets]);
    }

    
    public function store(Request $request)
    {
    $validatedData = $request->validate([

        'nama_aset' => 'required|string',
        'jumlah_aset'=> 'required|int',
        'harga' => 'required|int',
        'dekripsi' => 'required|string',
        'gambar' => 'gambar|file|max:50000',
    ]);

    $asets = Aset::create($validatedData);

    return response()->json(['message' => 'Favorite created successfully', 'data' => $asets], 201);
    }   

    public function update(Request $request, $idAset)
{
    $asets = Aset::find($idAset);

    if (!$asets) {
        return response()->json(['message' => 'Favorite not found'], 404);
    }

    $validatedData = $request->validate([
        'nama_aset' => 'string',
        'jumlah_aset' => 'string',
        'harga' => 'int',
        'deskripsi' => 'int',
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

public function getDataAsetFav(Request $request)
{
    $idCust = $request->input('idCust');

    $asetss = aset::all();

    if ($asetss->isEmpty()) {
        $response = array(
            'success' => false,
            'message' => 'No data found',
            'data' => null
        );
    } else {
        // Fetch the like data for the given customer ID
        $likes = Like::where('idCust', $idCust)->whereIn('idAset', $asetss->pluck('idAset'))->get();

        // Filter barang-barang yang memiliki is_liked bernilai true
        $likedAsetss = $likes->pluck('idAset')->toArray();

        // Filter barang-barang yang memiliki is_liked bernilai true
        $response = $asetss->filter(function ($asetss) use ($likedAsetss) {
            return in_array($asetss['idAset'], $likedAsetss);
        })->values()->toArray();

        // Tambahkan is_liked dengan nilai true pada setiap barang
        foreach ($response as &$asetss) {
            $asets['is_liked'] = true;
        }
    }

    return response()->json($response);
}

public function addDataFavorit(Request $request)
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
    
        $keranjang = Like::create($data);
    
        return response()->json($keranjang, 200);
    }

    public function deleteDataFavorit(Request $request)
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
    
        // Delete the favorit record
        Like::where('idCust', $data['idCust'])
            ->where('idAset', $data['idAset'])
            ->delete();
    
        return response()->json([
            'message' => 'The favorit record has been deleted successfully.'
        ], 200);
    }

}
