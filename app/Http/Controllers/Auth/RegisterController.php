<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Accesstype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $accessTypes = Accesstype::all();
        return view('auth.register', compact('accessTypes'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|confirmed|min:6',            
            'accesstype_id' => 'required|exists:accesstypes,id',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,            
            'password' => Hash::make($request->password),
            'accesstype_id' => $request->accesstype_id,
        ]);

        return redirect()->route('login');
    }
}
