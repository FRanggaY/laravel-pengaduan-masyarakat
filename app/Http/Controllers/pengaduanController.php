<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengaduan;
use App\Models\masyarakat;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;

class pengaduanController extends Controller
{
    public function homeindex(){
        $masyarakat = masyarakat::all();
        return view('pengaduan', ['masyarakat' => $masyarakat]);
    }
    public function store(Request $request){
        $request->validate([
            'isi_laporan' => 'required',
            'foto' => 'required',
            'nik' => 'required',
        ]);

        if($request->foto){
            // if($data->image){
            //     File::delete(public_path($data->image));
            // }
            $random = Str::random(5);
            $file_name = time().''.$random. '.' . $request->foto->extension();
            $request->foto->move(public_path('images/pengaduan'), $file_name);
            $path = "images/pengaduan/$file_name";

            pengaduan::create([
                'tgl_pengaduan' => date('Y-m-d'),
                'nik' => $request->nik,
                'isi_laporan' => $request->isi_laporan,
                'foto' => $path,
                'status' => '0',
            ]);
        }
        else{
            pengaduan::create([
                'tgl_pengaduan' => date('Y-m-d'),
                'nik' => $request->nik,
                'isi_laporan' => $request->isi_laporan,
                'foto' => 'KOSONG',
                'status' => '0',
            ]);
        }

        // masyarakat::create([
        //     'nik' => $request->nik,
        //     'nama' => $request->nama,
        //     'username' => 'KOSONG',
        //     'password' => 'KOSONG',
        //     'telp' => $request->telp,
        // ]);

        return redirect('/pengaduan')->with('success', 'Data berhasil dibuat');

    }
    public function index(){
        $pengaduan = pengaduan::with('masyarakat')->get();

        return view('access.pengaduan.index', ['pengaduan' => $pengaduan]);
    }
    public function detail($id){
        $pengaduan = pengaduan::with('masyarakat')->where('id_pengaduan', $id)->first();

        return view('access.pengaduan.detail', ['pengaduan' => $pengaduan]);
    }

    public function print($id){
        $pengaduan = pengaduan::with('masyarakat')->where('id_pengaduan', $id)->first();
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 15,
            'margin_right' => 15,
            'margin_top' => 20,
            'margin_bottom' => 30,
            'margin_header' => 10,
            'margin_footer' => 15,
        ]);
        $html = View::make('access.pengaduan.print')->with('pengaduan', $pengaduan);
        $html->render();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function updateStatus(Request $request, $id){
        $request->validate([
            'status' => 'required',
        ]);

        pengaduan::where('id_pengaduan', $id)->update([
            'status' => $request->status,
        ]);

        return redirect('/access/pengaduan')->with('success', 'Status berhasil diupdate');
    }

    public function destroy($id){
        $data = pengaduan::find($id);
        if($data->foto){
            File::delete(public_path($data->foto));
        }
        $data->delete();
        // Alert::success('Congrats', 'Data sudah dihapus!');
        return redirect('access/pengaduan')->with('Data berhasil dihapus');
    }
}
