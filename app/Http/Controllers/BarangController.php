<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;

class BarangController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = Barang::where('nama_barang','LIKE','%' .$request->search. '%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Barang::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }

        return view('databarang', compact('data'));
    }
    
    public function tambahbarang(){
        return view('tambahbarang');
    }

    public function insertdata(Request $request){
        $data = Barang::create($request->all());
        return redirect()->route('barang')->with('success','Data berhasil di Tambah');
    }

    public function tampildata($id){
        $data = Barang::find($id);
        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = Barang::find($id);
        $data->update($request->all());
        if(Session('halaman_url')){
            return Redirect(session('halaman_url'))->with('success','Data berhasil di Update');
        }

        return redirect()->route('barang')->with('success','Data berhasil di Update');
    }

    public function delete($id){
        $data = Barang::find($id);
        $data->delete();
        return redirect()->route('barang')->with('success','Data berhasil di Hapus');
    }

    public function eksporpdf(){
        $data = Barang::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('databarang-pdf');
        return $pdf->download('data.pdf');
    }
}
