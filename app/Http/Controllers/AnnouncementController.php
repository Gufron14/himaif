<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

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
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required|string',
            'status' => 'required|in:Dipublikasi,Draft',
        ],
    [
        'judul.required' => 'Judul harus diisi',
        'isi.required' => 'Pengumuman harus diisi',
        'status.required' => 'pilih status untuk dipublikasikan atau sebagai draft',
    ]);

        Announcement::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'status' => $request->status,
        ]);

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
        $title = 'Edit Aplikasi';
        $announcement = Announcement::findOrFail($id);

        return view('announcement.edit', compact('announcement', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'status' => 'required|in:Dipublikasi,Draft'
        ]);

        $announcement = Announcement::find($id);
        if (!$announcement) {
            return back()->withErrors(['message' => 'aplikasi tidak ditemukan']);
        }

        $data = [
            'judul' => $request->input('judul'),
            'isi' => $request->input('isi'),
            'status' => $request->input('status'),

        ];

        $announcement->update($data);

        session()->flash('message', 'Aplikasi berhasil diedit');

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
