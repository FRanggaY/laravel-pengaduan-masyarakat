<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\pengaduan;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function index()
    {
        $total_user = User::all()->count();
        $total_pengaduan = pengaduan::all()->count();
        $data = [
            'total_user' => $total_user,
            'total_pengaduan' => $total_pengaduan
        ];


        return view('dashboard', [ 'data' => $data ]);
    }
    public function settingsIndex()
    {
        return view('settings');
    }
    public function updatePassword(Request $request)
    {
        User::where('id', Auth::user()->id)->update([
            'password' => bcrypt($request->password)
        ]);
        return redirect('settings')->with('success', 'Password berhasil diubah');
    }
}
