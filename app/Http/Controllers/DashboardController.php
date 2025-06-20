<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
public function index()
{
    $users = User::with('profile')->get(); // load all users and their profiles
    return view('dashboard', compact('users'));
}

public function create() {
    return view('users.create');
}

public function store(Request $request) {
    $data = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
    ]);

    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);

    Profile::create([
        'user_id' => $user->id,
        'phone' => '',
        'address' => '',
    ]);

    return redirect()->route('dashboard')->with('success', 'User added.');
}

public function edit(User $user)
{
    return view('users.edit', compact('user'));
}

public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'nullable|string',
        'address' => 'nullable|string',
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email
    ]);

    $user->profile->update([
        'phone' => $request->phone,
        'address' => $request->address,
    ]);

    return redirect()->route('dashboard')->with('success', 'User updated successfully.');
}

public function destroy(User $user)
{
    $user->delete();

    return redirect()->route('dashboard')->with('success', 'User deleted successfully.');
}


}

