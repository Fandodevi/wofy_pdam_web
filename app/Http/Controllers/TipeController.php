<?php

namespace App\Http\Controllers;

use App\Models\tipe;

use Illuminate\Http\Request;

class TipeController extends Controller
{
    public function page()
    {
        return redirect()->route('admin.tipe');
    }

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = tipe::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = tipe::paginate(5); 
        }
        // dd($data);
        return view('tipe', compact('data'));

    }

    public function tambah()
    {
        return view('tipetambah');
    }

    public function insert(Request $request)
    {

        $data = $request->validate([
            'nama' => 'required',
           
        ]);
        $validatedData['nama'] = $request->nama;
        tipe::create($data);
        return redirect()->route('admin.tipe')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampil($id)
    {
        $data = tipe::find($id);
        return view('tipetampildata', compact('data'));

    }

    public function update(Request $request, $id)
    {
        $data = tipe::find($id);
        $data->update($request->all());
        return redirect()->route('admin.tipe')->with('success', 'Data Berhasil Di Update');

    }

    public function delete($id)
    {
        $data = tipe::find($id);
        $data->delete();
        return redirect()->route('admin.tipe')->with('success', 'Data Berhasil Di  Hapus');

    }

    public function dropdown()
    {

        $tipe = tipe::all();
        // $kategori = kategori::all();
        return view('tipetambah', compact('tipe'));
    }
}
