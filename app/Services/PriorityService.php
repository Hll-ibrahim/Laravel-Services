<?php

namespace App\Services;


use App\Repositories\PriorityRepository;

class PriorityService{

    protected PriorityRepository $priorityRepository;
    public function __construct(PriorityRepository $priorityRepository){
        $this->priorityRepository = $priorityRepository;
    }

    public function all(){
        return $this->priorityRepository->all();
    }
}
