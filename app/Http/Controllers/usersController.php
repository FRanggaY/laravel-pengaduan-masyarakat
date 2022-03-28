<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class usersController extends Controller
{
    public function index(){
        $user = User::all();

        return view('access.users.index', ['user' => $user]);
    }
    public function edit($id){
        $user = User::find($id);

        return view('access.users.edit', ['user' => $user]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'telp' => 'required',
            'level' => 'required',
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'telp' => $request->telp,
            'level' => $request->level,
        ]);

        return redirect('access/users')->with('success', 'Data berhasil diupdate');
    }

    public function store(Request $request){
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'level' => $request->level,
            'telp' => $request->telp
        ]);

        return redirect('access/users')->with('success', 'Data berhasil dibuat');
    }
    public function destroy($id){
        $data = User::find($id);
        $data->delete();
        // Alert::success('Congrats', 'Data sudah dihapus!');
        return redirect('access/users')->with('success', 'Data berhasil dihapus');
    }
}
