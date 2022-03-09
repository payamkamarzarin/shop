<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function Register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
//            'phone' => 'required',
            'password' => 'required',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return "dashboard";
    }
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
//            'phone' => $data['phone'],
            'password' => Hash::make($data['password'])
        ]);
    }
    public function dashboard()
    {
        if(Auth::check()){
            return "dashboard";
        }

        return "login";
    }
}
