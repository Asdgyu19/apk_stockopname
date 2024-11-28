<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::select('SELECT user.*, role.nama_role FROM user JOIN role ON user.idrole = role.idrole');
        $roles = DB::select('SELECT * FROM role');

        return view('user.index', ['users' => $users, 'roles' => $roles]);
    }

    public function save(Request $request)
    {
        $hashedPassword = ($request->input('password'));

        DB::insert('INSERT INTO user (username, password, idrole) VALUES (?, ?, ?)', [
            $request->input('username'),
            $hashedPassword,
            $request->input('idrole')
        ]);

        return redirect('/user/index')->with('success', 'User inserted successfully!');
    }

    public function edit($id)
    {
        $user = DB::select('SELECT * FROM user WHERE iduser = ?', [$id]);

        if (empty($user)) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $roles = DB::select('SELECT * FROM role');

        return view('user.edit', ['user' => $user[0], 'roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
        // Jika password diinputkan, maka hash password
        if ($request->input('password')) {
            $hashedPassword = ($request->input('password'));
            DB::update('UPDATE user SET username = ?, password = ?, idrole = ? WHERE iduser = ?', [
                $request->input('username'),
                $hashedPassword,
                $request->input('idrole'),
                $id
            ]);
        } else {
            // Jika password tidak diubah, update hanya username dan role
            DB::update('UPDATE user SET username = ?, idrole = ? WHERE iduser = ?', [
                $request->input('username'),
                $request->input('idrole'),
                $id
            ]);
        }

        return redirect('/user/index')->with('success', 'User updated successfully!');
    }

    public function delete($id)
    {
        DB::delete('DELETE FROM user WHERE iduser = ?', [$id]);

        return redirect('/user/index')->with('success', 'User deleted successfully!');
    }
}
