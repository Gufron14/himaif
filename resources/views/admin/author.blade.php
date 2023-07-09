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
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
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
                        <tr>
                            <td colspan="5" class="text-center">
                                Author belum ada
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
