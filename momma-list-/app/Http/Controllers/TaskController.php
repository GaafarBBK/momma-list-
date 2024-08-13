<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'sort' => ['in:before_date,priority,id']
        ]);
        $tasks = Task::query();

        if ($request->has('priority')) {
            $tasks = $tasks->where('priority', '=', $request->input('priority'));
        }
        if ($request->has('upcoming')) {
            $tasks = $tasks->where('before_date', '>=', date('Y-m-d H-i'));
        }

        if ($request->has('is done')) {        
             $tasks = $tasks->where('is_done', '=', $request->input('is done'));

        }

        //add filter by is_done
        if ($request->has('sort')) {
            $tasks = $tasks->orderBy($request->input('sort'), 'asc');
        }

        return response()->json([
            'data' => $tasks->get()
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => ['string','required'],
            'description' => ['string'],
            'is_done' => ['boolean'],
            'priority' => ['required','string','in:low,mid,high'],
        ]);

        Task::create($input);

        return response() -> json (['data'=>
            'Task added successfully'
        ]);
    }

    public function update()
    {

    }

    public function show()
    {
        
    }

    public function delete()
    {

    }
}
