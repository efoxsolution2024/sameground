<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }


   public function index() 
   {
    
    $tasks = Auth::user()->tasks()->with('user')->get();

    return view('navigation.task.index', compact('tasks'));
   }

   public function create() 
   {
    return view('navigation.task.create');
   }

   public function store(Request $request)
   {
       $request->validate([
           'title' => 'required',
           'description' => ['required', 'max:5000'],
           'status' => 'required',
           'assign' => 'required',
           'priority' => 'required',
       ]);

       $task = Auth::user()->tasks()->create([
           'title' => $request->title,
           'description' => $request->description,
           'status' => $request->status,
           'priority' => $request->priority,
           'assign' => $request->assign,
       ]);
    
    // Task::create($validated);

    return redirect('task')->with('message', 'Task added successfully.');
  }

  public function update(Request $request, Task $task)
  {
      $request->validate([
          'status' => 'required',
      ]);

      $task->update(['status' => $request->status]);

      // Log the status change
      $history = $task->histories()->create([
          'status' => $request->status,
          'user_id' => Auth::id(),
      ]);

      return response()->json([
          'success' => true,
          'history' => [
              'formatted_date_time' => $history->formatted_date_time,
              'user_name' => Auth::user()->name,
              'status' => $history->status,
              'task_title' => $task->title
          ]
      ]);
  }
  


  public function destroy() 
  {

  }
}
