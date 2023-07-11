@extends('admin.layout.app')
@section('title', 'Author')

@section('content')
    <div class="card card-shadow-mb-4">
        <div class="card-header py-3">
            <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addAuthorModal">
                + Author
            </button>

            {{-- Modal Create Author --}}
            <div class="modal fade" id="addAuthorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Daftarkan Author</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/author" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input type="text" name="nama" id="nama" class="form-control"
                                        placeholder="Nama Author">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="nim" id="nim" class="form-control"
                                        placeholder="NIM">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="angkatan" id="angkatan" class="form-control"
                                        placeholder="Angkatan">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="Nomor Telepon">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="alamat" id="alamat" class="form-control"
                                        placeholder="Alamat">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="username" id="username" class="form-control"
                                        placeholder="username untuk login">
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Password">
                                </div>
                                <div class="mb-3">
                                    <input type="file" name="avatar" id="avatar" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- End Modal Create Author --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Author</th>
                            <th>Status</th>
                            <th>Jumlah Konten</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($authors as $author)
                            <tr>
                                <td>{{ $author['id'] }}</td>
                                <td>{{ $author['nama'] }}</td>
                                <td><span class="badge badge-success">Aktif</span></td>
                                <td>2</td>
                                <td>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#lihatModal">
                                        Lihat
                                    </button>

                                    {{-- Modal Lihat --}}
                                    <div class="modal fade" id="lihatModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    {{ $author['id'] }}
                                                </div>
                                                <div class="modal-body">
                                                    nah ini
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- END MODAL --}}
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
