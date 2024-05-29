<?php

namespace App\Http\Controllers;

use App\Models\Penggajian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggajianController extends Controller
{
    public function index(){
         $data = DB::table('penggajians')
                ->join('pegawais', 'penggajians.id_pegawai', 'pegawais.id')
                ->select('penggajians.*', 'pegawais.nama_pegawai')
                ->latest()->paginate(5);
        // $data = Penggajian::latest()->paginate(5);
        $data = Penggajian::all();
        // return view('datapenggajian', compact('data'));
        return view('data_penggajian', compact('data'));
        }

        public function tambahpenggajian() 
        {
            // return view('tambahdatapenggajian);
            // dd($request->all());
            Penggajian::create($request->all());
            return redirect()->route('tambah_datapenggajian')->with('berhasil','Data Berhasil Ditambahkan');
        }
        public function insertdata_penggajian(Request $request)
        {
            //dd($request->all());
           Penggajian::create($request->all());
            return redirect()->route('penggajian')->with('berhasil','Data Berhasil Ditambahkan');
        }
        public function tampilkandata_penggajian($id)
        {
            $data = Penggajian::find($id);
            return view('tampil_datapenggajian', compact('data'));
        }
    public function updatedata_penggajian(Request $request, $id)
        {
            $data = Penggajian::find($id);
            $data->update($request->all());
            return redirect()->route('penggajian')->with('berhasil','Data Berhasil Diupdate');
        }
   
        public function deletedata_penggajian($id)
        {
            $data = Penggajian::find($id);
            $data->delete();
            return redirect()->route('penggajian')->with('berhasil','Data Berhasil Dihapus');
        }
        public function edit(Request $request, $id)
        {
            $data = Penggajian::find($id);
            $data->Edit($request->all());
            return redirect()->route('updatedata')->with('berhasil','Data Berhasil Diupdate');
        }
        public function detail_datagaji (Request $request,$id)
        {
            $data = Penggajian::find($id);
            $data->detail($request->all());
            return redirect()->route('penggajian')->with('berhasil','Data Berhasil Diupdate');
        }

}
