<?php

namespace App\Repositories;

use App\Models\Priority;
use App\Repositories\Interfaces\PriorityRepositoryInterface;

class PriorityRepository implements PriorityRepositoryInterface{
    public function all(){
        return Priority::all();
    }
}
