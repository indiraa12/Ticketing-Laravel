<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $data_pengguna = User::where("username", "LIKE", "%" . $request->search . "%")
                ->where("role_id", 2)
                ->get();
        } else {
            $data_pengguna = User::where("role_id", 2)->latest()->get();
        }
        return view("admin.pengguna.index", compact("data_pengguna"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pengguna.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "username" => [
                "required",
                "min:3",
                "max:30",
                "unique:users,username",
            ],
            "password" => "required",
            "min:5",
            "mix:20",
            "name" => "required",
            "alamat_penumpang" => "required",
            "tgl_lahir" => "required",
            "jenis_kelamin" => "required",
            "telepon" => "required",
        ]);

        $pengguna = $request->all();
        $pengguna["password"] = bcrypt($pengguna["password"]);
        User::create($pengguna);
        return redirect("/admin/pengguna")->with(
            "success",
            "Tambah Data Sukses!!"
        );
    }

    public function show(User $pengguna)
    {
        // return view("admin.pengguna.edit", compact("pengguna"));
    }

    public function edit(User $pengguna)
    {
        return view("admin.pengguna.edit", compact("pengguna"));
    }

    public function update(Request $request, User $pengguna)
    {
        $request->validate([
            "username" => [
                "required",
                "min:3",
                "max:30",
                "unique:users,username," . $pengguna->id,
            ],
            "password" => "nullable",
            "min:5",
            "mix:20",
            "name" => "required",
            "alamat_penumpang" => "required",
            "tgl_lahir" => "required",
            "jenis_kelamin" => "required",
            "telepon" => "required",
        ]);
        $data = $request->all();
        if ($request->password) {
            $data["password"] = bcrypt($data["password"]);
        } else {
            unset($data["password"]);
        }
        $pengguna->update($data);
        return redirect("/admin/pengguna")->with("success", "Update Data Sukses!!!");
    }

    public function destroy(User $pengguna)
    {
        $pengguna->delete();
        return redirect("/admin/pengguna")->with("success", "Hapus Data Sukses!!!");
    }
}
