<?php

namespace App\Http\Controllers;
use App\Models\ToDoList;
use App\Models\Tasks;
use App\Models\TodolistTasks;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class todolistcontroller extends Controller
{
    function index()
{
    $todolist = ToDoList::all();
    $tasks = Tasks::all();

    // Query to get the last 5 rows based on the most recent date
    $data = DB::table('to_do_lists')
        ->orderBy('id', 'desc') 
        ->limit(5)               
        ->get();

        $rates = DB::table('to_do_lists')
    ->orderBy('id', 'desc')
    ->limit(4)
    ->pluck('resault');
    $rates = $rates->map(function ($rate) {
        list($numerator, $denominator) = explode('/', $rate);
        return $numerator / $denominator;
    });

    // Calculate the total and average
    $total = $rates->sum();
    $average = $total /4 *100;


    $mostdonetasks = Tasks::select('id', 'name', 'perfect_done', 'created_at')
    ->get()
    ->map(function ($task) {
        if ($task->perfect_done) {
            // Split the "perfect_done" string into x and y
            [$x, $y] = explode('/', $task->perfect_done);
            $task->x = (int) $x; // Numerator
            $task->y = (int) $y; // Denominator
        } else {
            $task->x = null; // Handle cases where perfect_done is null
            $task->y = null;
        }
        return $task;
    });

    

    $topTasks = $mostdonetasks->sortByDesc('x')->take(3);
    $flopTasks = $mostdonetasks->sortBy('x')->take(3);
    $oldestTasks = $tasks->sortBy('y')->take(3);


    return view('todolist.index', [
        'todolist' => $todolist,
        'tasks' => $tasks,
        'data' => $data,
        'average' => $average,
        'topTasks' => $topTasks,
        'flopTasks' => $flopTasks,
        'oldestTasks' => $oldestTasks,
    ]);
}
        


function history(){
    $todolist = ToDoList::all();
    return view('todolist.history', ['todolist'=>$todolist]);
}



function taskshow($id){
$task = Tasks::findOrFail($id);
return view('todolist.taskshow',['task'=>$task]);
}




function alltasks(){
    $tasks = Tasks::all();
    return view('todolist.alltasks',['tasks'=>$tasks]);
}




function fill_todolist(Request $request){
    





    $yesTasks = json_decode($request->input('yes_tasks'), true);
    foreach ($yesTasks as $taskId) {
        $task = Tasks::find($taskId);
        if ($task) {
            $task->donecounter += 1;
            $toDate = Carbon::parse($task->created_at)->startOfDay();// had start of day katkhlini n7yed dok floating number li kyjiw mn created at bach ttl3li resualt integer f perfect done
            $currentdate = Carbon::now()->startOfDay();
            $days = $toDate->diffInDays($currentdate);
            $perfect_done_Result = $task->donecounter.'/'.$days;
            $task->perfect_done = $perfect_done_Result;

            if($task->level != null){

                $levels = json_decode($task->level);
                foreach($levels as $lvl){
                    if($task->donecounter == $lvl[0]){
                        $task->name = $lvl[1];  
                    }
    // db testiha 3la ktr mn lvl hh
                }
            }
            $task->save();
        }
    }

    $request->validate([
        'date' => 'required|date|unique:to_do_lists,date', // 'todolists' is your table, 'date' is the column to be unique
        'resault' => 'required|string',
    ]);

    // Create the new ToDoList entry
    ToDoList::create([
        'date' => $request->input('date'),
        'resault' => $request->input('resault'),
    ]);
        // rdi tjib task id w hna tdir 'donecounter' => $request->donecounter, tzidlo increment 
        return redirect()->route('todolist')->with('success', 'Todolist filled successfully!');
    
    
    
    }






    
function createTask(){
    return view('todolist.createTask');
}
function editTask($id){
    $task = Tasks::findOrFail($id);
    return view('todolist.editTask',['task'=>$task]);
}
function archeive(){
    $task = Tasks::all();
    return view('todolist.archeive',['tasks'=>$task]);
}

function TaskCreation(Request $request){


Tasks::create([
    'name' => $request->name,
    'description' => $request->description,
    'level' => $request->level,
    'future_beginning' => $request->future_beginning,
    'day_off' => $request->day_off ? json_encode($request->day_off) : null,
    'motivation' => $request->motivation,
]);

$todolist = ToDoList::all();
    $tasks = Tasks::all();

    // Query to get the last 5 rows based on the most recent date
    $data = DB::table('to_do_lists')
        ->orderBy('id', 'desc') 
        ->limit(5)               
        ->get();

        $rates = DB::table('to_do_lists')
    ->orderBy('id', 'desc')
    ->limit(4)
    ->pluck('resault');
    $rates = $rates->map(function ($rate) {
        list($numerator, $denominator) = explode('/', $rate);
        return $numerator / $denominator;
    });

    // Calculate the total and average
    $total = $rates->sum();
    $average = $total /4 *100;


    $mostdonetasks = Tasks::select('id', 'name', 'perfect_done', 'created_at')
        ->get();
        // ->map(function ($task) {
        //     // Split the "perfect_done" string into x and y
        //     [$x, $y] = explode('/', $task->perfect_done);
        //     $task->x = (int) $x; // Numerator
        //     $task->y = (int) $y; // Denominator
        //     return $task;
        // });

    $topTasks = $mostdonetasks->sortByDesc('x')->take(3);
    $flopTasks = $mostdonetasks->sortBy('x')->take(3);
    $oldestTasks = $tasks->sortBy('y')->take(3);


    return view('todolist.index', [
        'todolist' => $todolist,
        'tasks' => $tasks,
        'data' => $data,
        'average' => $average,
        'topTasks' => $topTasks,
        'flopTasks' => $flopTasks,
        'oldestTasks' => $oldestTasks,
    ]);

}


function TaskUpdate(Request $request ,$id){
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'level' => 'required|string',
        'future_beginning' => 'nullable|date',
        'day_off' => 'nullable|array', // Assuming day_off is an array
        'motivation' => 'nullable|string',
    ]);


$task = Tasks::findOrFail($id);

$task->name = $validatedData['name'];
    $task->description = $validatedData['description'];
    $task->level = $validatedData['level'];
    $task->future_beginning = $validatedData['future_beginning'];
    if (isset($validatedData['day_off'])) {
        $task->day_off = $validatedData['day_off'] ? json_encode($validatedData['day_off']) : null;
    } else {
        $task->day_off = null;
    }
    $task->motivation = $validatedData['motivation'];

    // Save the updated task
    $task->save();

    // Redirect back to the task page or another page with a success message
    return redirect()->route('taskshow', $task->id)->with('success', 'Task updated successfully!');
}

function archeivefunc($id){
$task = Tasks::findOrFail($id);
if($task->deleted == 1){
    $task->deleted = 0;
    $task->save();
    return redirect()->route('todolist', $task->id)->with('success', 'Task is back successfully!');
}else{
    $task->deleted = 1;
    $task->save();
    return redirect()->route('archeive', $task->id)->with('success', 'Task is archeived successfully!');
}
}







function taskinsert(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $task = new Tasks;
        $task->name = $validated['name'];
        $task->save();
        return redirect()->route('todolist');
}

public function destroy($id){
    // Find the task by ID
    $task = Tasks::findOrFail($id);

    // Delete the task
    $task->delete();

    // Redirect back with a success message
    return redirect()->route('todolist')->with('success', 'Task deleted successfully');
}
public function todolist_delete($id){
    $todolist = ToDoList::findOrFail($id);
$todolist->delete();
return redirect()->route('history')->with('success', 'todolist submittion deleted successfully');
}
}