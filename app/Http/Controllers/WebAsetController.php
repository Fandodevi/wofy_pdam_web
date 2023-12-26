<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\tipe;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;

class WebAsetController extends Controller
{
    public function page()
    {
        return redirect()->route('admin.aset');
    }

    // public function index(Request $request)
    // {

    //     $data = DB::select('CALL GetAsetData()');

    //     $searchTerm = $request->search;

    //     $data = array_filter($data, function($item) use ($searchTerm) {
    //         return strpos($item->nama_aset, $searchTerm) !== false || strpos($item->kategori, $searchTerm) !== false
    //         || strpos($item->tipe, $searchTerm) !== false;
    //     });

    //     // $data = array_slice($data, 0, 5);
        

    //     $data = new \Illuminate\Pagination\LengthAwarePaginator($data, count($data), 5);

    //     return view('aset', ['data' => $data]);
    // }

    public function index(Request $request)
    {
        // // Ambil data dari stored procedure
        // $result = collect(DB::select('CALL GetAsetData()'));

        // $searchTerm = $request->input('search');
        // if ($searchTerm) {
        //     $result = $result->filter(function ($item) use ($searchTerm) {
        //         return strpos($item->nama_aset, $searchTerm) !== false ||
        //             strpos($item->kategori, $searchTerm) !== false ||
        //             strpos($item->tipe, $searchTerm) !== false;
        //     });
        // }

        // $perPage = 5; // Sesuaikan dengan jumlah item per halaman yang diinginkan
        // $currentPage = $request->query('page', 1);
        // $pagedData = $result->slice(($currentPage - 1) * $perPage, $perPage)->all();
        // $data = new \Illuminate\Pagination\LengthAwarePaginator($pagedData, count($result), $perPage, $currentPage);
        // $data->setPath('aset');

        // return view('aset', compact('data'));

        if($request->has('search')){
            $data = product::where('name', 'LIKE', '%'.$request->search.'%')->paginate(5);
        }else{
        $data = product::paginate(5); }
        return view('aset', compact('data'));

    }
    
    public function tambah()
    {
        return view('asettambah');
    }

    public function insert(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'tipe' => 'required',
            'keterangan' => 'required',
            'price' => 'required',
            'image' => 'image|file|max:50000',
        ]);
        if($data){
            $product = new Product();
            $product->name = $data['name'];
            $product->category = $data['category'];
            $product->tipe = $data['tipe'];
            $product->keterangan = $data['keterangan'];
            $product->price = $data['price'];
    
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalName();
                $image->move(public_path('product'), $imageName);
                $product->image = $imageName;
            }
    
            $product->save();
    
            return redirect()->route('admin.aset')->with('success', 'Data Berhasil Ditambahkan');
        }else{
            return back()->withErrors(['error'=>'Failed to add the product.']);
      // $data['jumlah_aset'] = $request->has('jumlah_aset') ? $data['jumlah_aset'] : 0;

        // product::create($data);
        // return redirect()->route('admin.aset')->with('success', 'Data Berhasil Ditambahkan');
    }
}

    public function tampil($id)
    {
      
        $data = product::find($id);
        $tipe = tipe::all();
        $kategori = kategori::all();
        return view('asettampildata', compact('data','tipe','kategori'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'tipe' => 'required',
            'keterangan' => 'required',
            'price' => 'required',
            'image' => 'image|file|max:50000',
        ]);

        // Find the Aset record with the specified ID
        $product = product::find($id);

        if (!$product) {
            return redirect()->route('admin.aset')->with('error', 'Data tidak ditemukan');
        }

        // Handle image update
        if ($request->hasFile('image')) {
            if (!empty($product->image)) {
                // Assuming 'gambar' is the image field
                Storage::delete($product->image);
                $product->delete();
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('product'), $imageName);// Store in 'gambar-aset' directory
            $product->image = $imageName;
        }

        // Update other fields
        $product->name = $validatedData['name'];
        $product->category = $validatedData['category'];
        $product->tipe = $validatedData['tipe'];
        $product->keterangan = $validatedData['keterangan'];
        $product->price = $validatedData['price'];


        // Save the changes
        $product->save();

        return redirect()->route('admin.aset')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $data = product::find($id);
        $data->delete();
        return redirect()->route('admin.aset')->with('success', 'Data Berhasil Di  Hapus');
    }

    public function dropdown()
    {

        $tipe = tipe::all();
        $kategori = kategori::all();
        return view('asettambah', compact('tipe', 'kategori'));
    }

}
