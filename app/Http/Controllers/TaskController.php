<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a list of all of the user´s tasks
     * @param Request $request
     * @return Response
     */

    public function index(Request $request)

    {
        $tasks = $request->user()->tasks()->orderBy('created_at', 'desc')->get();

        return view('tasks.tasks', ['tasks' => $tasks]);
    }

    /**
     * Create a new task
     * @param Request $request
     * @return Response
     */

    public function store(Request $request)
    {
        // dd($request); //equivale a vardump
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        $request->user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect('/tasks');
    }


    /**
     * Display edit form
     * @param Task id $id
     * @return Response
     */

    public function editView($id)
    {
        $task = Task::findorfail($id);

        if (!$task) {
            return redirect('/tasks');
        }
        $this->authorize('verify', $task);
        return view('/tasks.tasks-edit', ['task' => $task]);
    }


    /**
     * Display edit form
     * @param Task id $id
     * @param Request $request
     * @return Response
     */

    public function edit(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $task = Task::findorfail($id);
        $this->authorize('verify', $task);

        if ($task) {
            $task->title = $request->title;
            $task->description = $request->description;
            $task->save();
        }
        return redirect('/tasks');
    }

    /**
     * Delete a  task
     * @param $id
     * @return Response
     */

    public function destroy($id)
    {
        $task = Task::findorfail($id);
        $this->authorize('verify', $task);


        if ($task) {
            $task->delete();
        }
        return redirect('/tasks');
    }
    /**
     * Update a  task
     * @param $id
     * @return Response
     */
}