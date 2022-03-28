<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\masyarakat;

class masyarakatController extends Controller
{
    public function index(){
        $masyarakat = masyarakat::all();

        return view('access.masyarakats.index', ['masyarakat' => $masyarakat]);
    }
    public function edit($id){
        $masyarakat = masyarakat::find($id);

        return view('access.masyarakats.edit', ['masyarakat' => $masyarakat]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'telp' => 'required',
            // 'username' => 'required',
        ]);

        masyarakat::where('nik', $id)->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'telp' => $request->telp,
            // 'username' => $request->username,
        ]);
        return redirect('access/masyarakats')->with('success', 'Data berhasil diupdate');
    }

    public function store(Request $request){
        masyarakat::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'telp' => $request->telp,
            'username' => 'KOSONG',
            'password' => 'KOSONG',
            // 'username' => $request->username,
            // 'password' => bcrypt($request->password),
        ]);

        return redirect('access/masyarakats')->with('success', 'Data berhasil dibuat');
    }
    public function destroy($id){
        $data = masyarakat::find($id);
        $data->delete();
        // Alert::success('Congrats', 'Data sudah dihapus!');
        return redirect('access/masyarakats')->with('success', 'Data berhasil dihapus');
    }
}
