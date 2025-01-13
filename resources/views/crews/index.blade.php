@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Crew</h1>
        <a href="{{ route('crews.create') }}" class="btn btn-primary">Tambah Crew</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($crews as $crew)
                    <tr>
                        <td>{{ $crew->name }}</td>
                        <td>{{ $crew->position }}</td>
                        <td>{{ $crew->email }}</td>
                        <td>
                            <a href="{{ route('crews.show', $crew->id) }}" class="btn btn-info">Detail</a>
                            <a href="{{ route('crews.edit', $crew->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('crews.destroy', $crew->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
