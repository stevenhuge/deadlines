@extends('layouts.app')

@section('content')
    <h1>Daftar Tugas</h1>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Buat Tugas Baru</a>

    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Status</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>
                        @if ($task->status == 'pending')
                            <button class="btn btn-warning">{{ $task->status }}</button>
                        @elseif ($task->status == 'approved')
                            <button class="btn btn-success">{{ $task->status }}</button>
                        @elseif ($task->status == 'rejected')
                            <button class="btn btn-danger">{{ $task->status }}</button>
                        @endif
                    </td>
                    <td>{{ $task->score ?? '-' }}</td>
                    <td>
                        <a href="{{ route('tasks.show', $task) }}" class="btn btn-info">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
