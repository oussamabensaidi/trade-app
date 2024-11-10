<?php

namespace App\Http\Controllers;
use App\Models\ToDoList;
use App\Models\Tasks;
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
        
            return view('todolist.index', [
                'todolist' => $todolist,
                'tasks' => $tasks,
                'data' => $data,
                'average' => $average
            ]);
        }
        
function history(){
    $todolist = ToDoList::all();
    return view('todolist.history', ['todolist'=>$todolist]);
}



    





    function fill_todolist(Request $request){
        $todolist = ToDoList::create([
            'date' => $request->input('date'),
            'resault' => $request->input('resault'),
        ]);
        return redirect()->route('todolist')->with('success', 'Todolist filled successfully!');
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
}
