<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    public function index(){
        $users = User::query()
            ->orderByRaw('name ASC')
            ->get();
        return view('admin_users.users', ['users' => $users]);
    }

    public function create()
    {
        $users = User::all();
        return view('admin_users.create');
    }

    public function store(Request $request)
    {
        if($request['password'] === $request['password-confirm']){
            $request->validate([
                'name' => 'required', 'string', 'max:255',
                'lastname' => 'required', 'string', 'max:255',
                'password' => 'required', 'string', 'min:8', 'confirmed',
                'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
                'phone' => 'required', 'string', 'max:15', 'unique:users'
            ]);
            User::create([
                'name' => $request['name'],
                'lastname' => $request['lastname'],
                'password' => Hash::make($request['password']),
                'email' => $request['email'],
                'phone' => $request['phone'],
                'admin_role' => $request['admin'],
                'post_role' => $request['post']
            ]);
            return redirect()->route('users.index');
        }
        return view('admin_users.create');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin_users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string',
            'phone' => 'required|string'
        ]);
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->admin_role = $request->get('admin');
        $user->post_role = $request->get('post');
        $user->save();
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $post = User::find($id);
        $post->delete();
        return redirect()->route('users.index');
    }
}
