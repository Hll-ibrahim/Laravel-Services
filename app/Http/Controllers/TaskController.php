<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $tasks = $this->taskService->getAllTasks();
        return response()->json($tasks);
    }

    public function show($id)
    {
        $task = $this->taskService->getTaskById($id);
        return response()->json($task);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $task = $this->taskService->createTask($data);
        return response()->json($task, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $task = $this->taskService->updateTask($id, $data);
        return response()->json($task);
    }

    public function destroy($id)
    {
        $this->taskService->deleteTask($id);
        return response()->json(null, 204);
    }
}
