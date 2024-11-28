<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $role = DB::select('SELECT * FROM role');

        return view('role.index', ['role' => $role]);
    }

    public function save(Request $request)
    {
        DB::statement("USE pbd_uts");

        $nama_role = $request->input('nama_role');
        DB::insert('INSERT INTO role (nama_role) VALUES (?)', [$nama_role]);

        return redirect()->back()->with('success', 'Data inserted successfully!');
    }

    public function edit($id)
    {
        $role = DB::select('SELECT * FROM role WHERE idrole = ?', [$id]);

        // Jika data tidak ditemukan
        if (empty($role)) {
            return redirect()->back()->with('error', 'Role not found.');
        }

        return view('role.edit', ['role' => $role[0]]);
    }

    public function update(Request $request, $id)
    {
        // mengambil input dari form
        $nama_role = $request->input('nama_role');

        // update data role di database
        DB::update('UPDATE role SET nama_role = ? WHERE idrole = ?', [$nama_role, $id]);

        return redirect('/role/index')->with('success', 'Role updated successfully!');
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM role WHERE idrole = ?', [$id]);

        return redirect('/role/index')->with('success', 'Role deleted successfully!');
    }
}
