@extends('layouts.app')

@section('content')
    <h1>Daftar Tugas</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Pengirim</th>
                <th>Status</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->user->name }}</td>
                    <td>{{ $task->status }}</td>
                    <td>
                        <form action="{{ route('admin.update', $task) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="score" value="{{ $task->score }}" class="form-control">
                            <select name="status" class="form-control">
                                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ $task->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected" {{ $task->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
