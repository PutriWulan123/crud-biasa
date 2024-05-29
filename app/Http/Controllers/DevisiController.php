<?php

namespace App\Http\Controllers;

use App\Models\Devisi;
use Illuminate\Http\Request;

class DevisiController extends Controller
{
        public function index()
        {
        $data = Devisi::all();
        return view('data_devisi', compact('data'));
        }

        public function tambahdevisi() 
        {
            // return view('tambahdatadevisi);
            // dd($request->all());
            Devisi::create($request->all());
            return redirect()->route('tambah_datadevisi')->with('berhasil','Data Berhasil Ditambahkan');
        }
        public function insertdata_devisi(Request $request)
        {
            //dd($request->all());
           Devisi::create($request->all());
            return redirect()->route('devisi')->with('berhasil','Data Berhasil Ditambahkan');
        }
        public function tampilkandata_devisi($id)
        {
            $data = Devisi::find($id);
            return view('tampildata', compact('data'));
        }
    public function updatedata_devisi(Request $request, $id)
        {
            $data = Devisi::find($id);
            $data->update($request->all());
            return redirect()->route('devisi')->with('berhasil','Data Berhasil Diupdate');
        }
   
        public function deletedata_devisi($id)
        {
            $data = Devisi::find($id);
            $data->delete();
            return redirect()->route('devisi')->with('berhasil','Data Berhasil Dihapus');
        }
        public function edit(Request $request, $id)
        {
            $data = Devisi::find($id);
            $data->edit($request->all());
            return redirect()->route('updatedata')->with('berhasil','Data Berhasil Diupdate');
        }
        // public function show($id)
        // {
        //     //mengambil devisi dan pegawainya
        //     $devisi = Devisi::with('pegawai')->find($id);

        //     if (!$devisi) {
        //         return response()->view(['message' => 'Devisi not found'], 404);
        //     }
        //     return view('devisi.show', ['devisi' => $devisi]);
        // }
        public function show($id)
    {
        $devisi = Devisi::findOrFail($id);

        return view('data_devisi', compact('devisi'));
    }

}
