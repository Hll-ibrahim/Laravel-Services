<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface {

    public function index(){
        return Task::all();
    }
    public function find(int $id){
        return Task::findOrFail($id);
    }
    public function create($data)
    {
        return Task::create($data);
    }
    public function update($id, $data)
    {
        $task = Task::findOrFail($id);
        $task->update($data);
        return $task;
    }
    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return $task;
    }
}
