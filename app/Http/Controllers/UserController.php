<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registerView()
    {
        return view('register', [
            'title' => 'Register | eventnizer'
        ]);
    }

    //POST register
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'fname' => 'required|max:50',
            'lname' => 'required|max:50',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        // $request->$request->session()->flash('key', 'registrasi akun berhasil');

        return redirect('/login')->with('success', 'Registrasi akun berhasil');
    }

    public function loginView()
    {
        return view('login', [
            'title' => 'Login | eventnizer'
        ]);
    }

    //POST login user
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:255',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('error', 'Login failed');
    }

    //POST logout akun
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
