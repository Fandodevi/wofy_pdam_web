<?php

namespace App\Http\Controllers;
use App\Models\customer;
use App\Models\product;
use App\Models\order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(){
        $jumlah_cust = Customer::count(); 
        $jumlah_aset = Product::count(); 
        $jumlah_transaksi = Order::count(); 
        return view('dashboard' , compact('jumlah_cust', 'jumlah_aset', 'jumlah_transaksi'));
        return view('dashboard');
        
    }

    // public function count()
    // {
    //     $jumlah_cust = Customer::count(); // Mengambil jumlah pengguna
    //     return view('dashboard', compact('jumlah_cust'));
    // }
}
