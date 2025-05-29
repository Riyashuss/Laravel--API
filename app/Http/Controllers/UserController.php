<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)	
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:1000',
			'phone' => 'required|string|max:1000'
        ]);

        $task = Task::create([
            'name' => $validated['name'],
            'address' => $validated['address'],
			 'phone' => $validated['phone'],
        
        ]);

        return response()->json($task, 201); 
    }


    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

 
    public function webTasks()
    {
        $tasks = Task::all();
        return view('student', compact('tasks')); 
    }
}
