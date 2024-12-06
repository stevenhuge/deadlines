<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\fileExists;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create() {
        return view('tasks.create-task');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,png,jpg,jpeg',
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->file = $request->file('file')->store('tasks');
        $task->status = 'pending';
        $task->user_id = Auth::id();
        $task->save();

        return redirect()->route('dashboard');
    }

    public function show(Task $task)
    {
        $filePath = storage_path('app/public/' . $task->file);
        if(fileExists($filePath)) {
            return view('tasks.show', compact('task', 'filePath'));
        } else {
            return view('tasks.show', compact('task'))->with('fileNotFound', true);
        }
    }

    // public function download(Task $task) {
    //     $filePath = Storage::url($task->file);
    //     if(file_exists($filePath)) {
    //         return Storage::download($filePath, $task->file);
    //     } else {
    //         return redirect()->route('tasks.show', $task)->with('error', 'File not found.');
    //     }
    // }

    public function admin_index() {
        $tasks = Task::all();
        return view('admin.dashboard', compact('tasks'));
    }

    public function admin_update(Task $task, Request $request) {
        $request->validate([
            'status' => 'required',
            'score' => 'nullable|numeric',
        ]);

        $task->status = $request->status;
        $task->score = $request->score;
        $task->save();

        return redirect()->route('admin.dashboard');
    }
}
