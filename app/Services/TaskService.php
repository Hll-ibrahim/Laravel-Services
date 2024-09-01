<?php
namespace App\Services;

use App\Models\Task;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Repositories\TaskRepository;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository){
        $this->taskRepository = $taskRepository;
    }
    public function getAllTasks()
    {
        return $this->taskRepository->getTasks();
    }

    public function getTaskById($id)
    {
        return Task::findOrFail($id);
    }

    public function createTask($data)
    {
        return Task::create($data);
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
