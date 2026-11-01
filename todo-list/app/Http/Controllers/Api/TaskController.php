<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Task::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'user_id' => 'required|integer|exists:users,id'
        ]);
        return Task::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Task::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->validate([
            'title' => 'sometimes|string',
            'description' => 'sometimes|string',
            'deadline' => 'sometimes|dateTime',
            'user_id' => 'sometimes|integer|exists:users,id'
        ]);

        $task = Task::findOrFail($id);
        $task->update($data);
        return $task;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json([
            'message'=>"Task deleted successfully"
        ]);
    }
}
