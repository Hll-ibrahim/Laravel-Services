<?php

namespace App\Repositories\Interfaces;

interface TaskRepositoryInterface{

    function index();
    function find(int $id);
    function create(array $attributes);
    function update(int $id,array $attributes);
    function delete(int $id);
}
