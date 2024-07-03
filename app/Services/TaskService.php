<?php
namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\RateLimiter;

class TaskService
{
    public function getAllTasks()
    {
        return Task::all();
    }

    public function getTaskById($id)
    {
        return Task::findOrFail($id);
    }

    public function createTask($data)
    {
        $executed = RateLimiter::attempt(
            'send-message:'.$data['name'],
            5,
            function() use($data) {
                Task::create($data);
            },
            10
        );
        if (! $executed) {
            return 'Too many messages sent!';
        }
        return $data;
    }

    public function updateTask($id, $data)
    {
        $task = Task::findOrFail($id);
        $task->update($data);
        return $task;
    }

    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return $task;
    }
}
