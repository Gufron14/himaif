@extends('admin.layout.app')
@section('title', 'Pengumuman')

@section('content')

    

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#exampleModal">+
                Pengumuman</button>

            {{-- Modal Tambah Pengumuman --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Buat Pengumuman</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('announcement.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input type="text" class="form-control
                                        @error('judul') is-invalid @enderror"
                                        placeholder="Judul" name="judul">
                                </div>
                                @error('judul')
                                    <div class="invalid-feedback">
                                        isi judul
                                    </div>
                                @enderror
                                <div class="mb-3">
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <textarea name="isi" id="" cols="30" rows="6" class="form-control" placeholder="Isi Pengumuman"
                                        required></textarea>
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="link" id="link" class="form-control"
                                        placeholder="masukan link jika ada">
                                </div>
                                <div class="mb-3">
                                    <select class="form-control mt-3 @error('status') is-invalid @enderror" name="status"
                                        id="kategori" aria-label="Default select example">
                                        <option selected class="text-muted">--Pilih Status--</option>
                                        <option value="Dipublikasi">Dipublikasi</option>
                                        <option value="Draft">Draft</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            Pilih Publikasikan atau sebagai Draft
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th>Isi</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($announcements as $announcement)
                            <tr>
                                <td>{{ $announcement['judul'] }}</td>
                                <td>
                                    <img src="{{ url('image') . '/' . $announcement->image }}" alt=""
                                        style="max-width:100px; max-height:120px;" />
                                </td>
                                <td>{{ $announcement['isi'] }}</td>
                                <td>{{ $announcement['link'] }}</td>
                                <td>
                                    @if ($announcement['status'] == 'Dipublikasi')
                                        <span class="badge badge-success justify-content-center">Dipublikasi</span>
                                    @else
                                        <span class="badge badge-danger">Draft</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex justify-content-beetwen">
                                        <a href="{{ url('/announcement/' . $announcement->id . '/edit') }}"
                                            class="btn btn-warning" data-toggle="modal" data-target="#editModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>


                                        {{-- Modal Edit Pengumuman --}}
                                        <div class="modal fade" id="editModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Pengumuman</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form
                                                        action="{{ route('announcement.update', ['id' => $announcement->id]) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="judul">Judul</label>
                                                                <input type="text" class="form-control" name="judul"
                                                                    id="judul"
                                                                    value="{{ old('judul', $announcement->judul) }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <input type="file" name="image" id="image"
                                                                    class="form-control"
                                                                    value="{{ old('image', $announcement->image) }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <textarea name="isi" id="isi" cols="30" rows="6" class="form-control"
                                                                    placeholder="{{ old('isi', $announcement->isi) }}"></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <input type="text" name="link" id="link"
                                                                    class="form-control"
                                                                    value="{{ old('link', $announcement->link) }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <select name="status" id=""
                                                                    class="form-control">
                                                                    <option value="{{ $announcement->id }}">
                                                                        {{ $announcement->status }}</option>
                                                                    <option value="Dipublikasi">Dipublikasi</option>
                                                                    <option value="Draft">Draft</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Edit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="{{ route('announcement.destroy', $announcement->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                </svg>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="mx-auto text-center">
                                    <p class="text-muted">Pengumuman Kosong</p>
                                    <button class="btn btn-primary fw-bold" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Tambah Pengumuman
                                    </button>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
