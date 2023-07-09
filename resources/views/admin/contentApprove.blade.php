@extends('admin.layout.app')

@section('title', 'Persetujuan Konten')

@section('content')

    <div class="card card-shadow mb-4">
        <div class="card-header py-3">
            Konten Baru
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>author_id</th>
                            <th>Nama Author</th>
                            <th>Isi Konten</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4" class="text-center">belum ada Konten masuk</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection