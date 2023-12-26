<?php

namespace App\Http\Controllers;
use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function page()
    {
        return redirect()->route('admin.kategori');
    }

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = kategori::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = kategori::paginate(5); 
        }
        // dd($data);
        return view('kategori', compact('data'));

    }

    public function tambah()
    {
        return view('kategoritambah');
    }

    public function insert(Request $request)
    {

        $data = $request->validate([
            'nama' => 'required',
           
        ]);
        $validatedData['nama'] = $request->nama;
        kategori::create($data);
        return redirect()->route('admin.kategori')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampil($id)
    {
        $data = kategori::find($id);
        return view('kategoritampil', compact('data'));

    }

    public function update(Request $request, $id)
    {
        $data = kategori::find($id);
        $data->update($request->all());
        return redirect()->route('admin.kategori')->with('success', 'Data Berhasil Di Update');

    }

    public function delete($id)
    {
        $data = kategori::find($id);
        $data->delete();
        return redirect()->route('admin.kategori')->with('success', 'Data Berhasil Di  Hapus');

    }

    public function dropdown()
    {

        $data = kategori::all();
        // $kategori = kategori::all();
        return view('kategoritambah', compact('data'));
    }
}
