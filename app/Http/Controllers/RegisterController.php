<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register.register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            "username" => [
                "required",
                "min:3",
                "max:30",
                "unique:users,username",
            ],
            "password" => "required",
            "min:5",
            "max:20",
            "name" => "required",
            "alamat_penumpang" => "required",
            "tgl_lahir" => "required",
            "jenis_kelamin" => "required",
            "telepon" => "required",

        ]);

        $validateData["password"] = bcrypt($validateData["password"]);
        User::create($validateData);

        return redirect("/login")->with(
            "success",
            "Registration Succes!!"
        );
    }
}
