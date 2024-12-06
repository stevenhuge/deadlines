@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Task Details</h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <p>{{ $task->title }}</p>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <p>{{ $task->description }}</p>
                        </div>

                        <div class="form-group">
                            <label for="file">File</label>
                            <br />
                            @if (isset($filePath))
                                <a href="{{ route('tasks.download', ['task' => $task->id]) }}" target="">{{ $task->title }} .{{ strtoupper(pathinfo($task->file, PATHINFO_EXTENSION)) }}</a>
                            @elseif (isset($fileNotFound) && $fileNotFound)
                                <p>File not found.</p>
                            @else
                                <p>No file uploaded</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <p>{{ ucfirst($task->status) }}</p>
                        </div>

                        <div class="form-group">
                            <label for="score">Score</label>
                            <p>{{ $task->score ?? 'Not graded yet' }}</p>
                        </div>

                        <div class="form-group">
                            <label for="user">Submitted By</label>
                            <p>{{ $task->user->name }}</p>
                        </div>

                        <div class="form-group">
                            <label for="created_at">Submitted At</label>
                            <p>{{ $task->created_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
