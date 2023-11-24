<?php

namespace App\Contracts\Repositories;

interface UserRepository extends BaseRepository
{
    public function all();
    public function find($id);
    public function registerUser($data = []);
}

