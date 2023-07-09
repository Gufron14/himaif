<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Storage;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['announcements'] = Announcement::all();

        return view('admin.announcement', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['announcements'] = Announcement::all();

        return view('announcements/add', $data);    
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
        $this->validate($request, [
            'judul' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'isi' => 'required|string',
            'status' => 'required|in:Dipublikasi,Draft',
        ]);

        // upload image
        $image_file = $request->file('image');
        $image_ekstensi = $image_file->extension();
        $image_nama = date('ymdhis') . '.' . $image_ekstensi;
        $image_file->move(public_path('image'), $image_nama);

        // simpan data ke database
        $data = [
            'judul' => $request->input('judul'),
            'image' => $image_nama,
            'isi' => $request->input('isi'),
            'link' => $request->input('link'),
            'status' => $request->input('status'),
        ];

        Announcement::create($data);

        return redirect('/announcement');
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
    public function edit(string $id)
    {
        $announcement = Announcement::findOrFail($id);

        return view('announcement.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'isi' => 'required',
            'link' => 'required',
            'status' => 'nullable|in:Dipublikasi,Draft',
        ]);

        $announcement = Announcement::find($id);
        if (!$announcement) {
            return back()->withErrors(['message' => 'pengumuman tidak ditemukan']);
        }

        $data = [
            'judul' => $request->input('judul'),
            'isi' => $request->input('isi'),
            'link' => $request->input('link'),
            'status' => $request->input('status')
        ];

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png,gif',
            ]);
            $image_file = $request->file('image');
            $image_ekstensi = $image_file->extension();
            $image_nama = date('ymdhis') . '.' . $image_ekstensi;
            $image_file->move(public_path('image'), $image_nama);

            $data_image = Announcement::where('judul', $id)->first();
            File::delete(public_path('image' . '/' . $data_image->image));

            $data['image'] = $image_nama;
        }

        $announcement->update($data);

        return redirect('/announcement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = Announcement::find($id);

        // Hapus item produk
        $announcement->delete();

        session()->flash('message', 'Aplikasi berhasil dihapus');

        return redirect()->back();
    }
}
