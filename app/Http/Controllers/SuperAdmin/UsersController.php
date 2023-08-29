<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $listusers['listusers'] = User::Paginate(10)->onEachSide(2);
        return view('dashboard.admin.users.index')->with($listusers);
    }

    public function updateUser(Request $request, $id)
    {
        $users = User::find($id);
        $users->level = $request->input('level_user');
        $users->update();

        return redirect('users')->with('success', "Level User berhasil di ubah");
    }

    public function destroy($id): RedirectResponse
    {
        $deleteUser = User::findOrFail($id);
        $deleteUser ->delete();
        return redirect('users');
    }

}
