<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpKernel\HttpCache\StoreInterface;

class UserController extends Controller
{
    public function adminIndex()
    {
        $users = User::all();
        return view('admin.admin_users', compact('users'));
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->all());

        return redirect()->route('admin.users.index')->with('success', 'User added successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->all());

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
