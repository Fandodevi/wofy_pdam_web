<?php

namespace App\Http\Controllers;
use App\Models\customer;
use Illuminate\Http\Request;

class WebCustomerController extends Controller
{
    public function page(){
        return redirect()->route('admin.customers');
    }
    
    public function index(Request $request)
{
    if($request->has('search')){
        $data = customer::where('name', 'LIKE', '%'.$request->search.'%')->paginate(5);
    }else{
    $data = customer::paginate(5); }
    return view('Customers', compact('data'));

    

    // if($request->has('search')){
    //     $data = Admin::where('username', 'LIKE', '%'.$request->search.'%')->paginate(5);
    // }else{
    // $data = Admin::paginate(5); }
    // return view('admin', compact('data'));
    
}
// public function count()
// {
//     $jumlah_cust = Customer::count(); // Mengambil jumlah pengguna
//     return view('dashboard', compact('jumlah_cust'));
// }
}
