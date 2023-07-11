<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['authors'] = Author::all();

        return view('admin.author', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['authors'] = Author::all();
        return view('author/add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi form
        $validatedData = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'angkatan' => 'required',
            'phone' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'password' => 'required|min:8',
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg',
        ]);

        // upload avatar
        if ($request->hasFile('avatar')) {
            $avatar_file = $request->file('avatar');
            $avatar_ekstensi = $avatar_file->getClientOriginalExtension();
            $avatar_nama = date('ymdhis') . '.' . $avatar_ekstensi;
            $avatar_file->move(public_path('avatar'), $avatar_nama);
        } else {
            $avatar_nama = null;
        }

        $data = [
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'angkatan' => $request->input('angkatan'),
            'phone' => $request->input('phone'),
            'alamat' => $request->input('alamat'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->password),
            'avatar' => $avatar_nama,
        ];

        Author::create($data);

        session()->flash('message', 'Author ditambahkan');

        return redirect('/author');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
