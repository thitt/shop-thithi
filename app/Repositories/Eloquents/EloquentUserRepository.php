<?php

namespace App\Repositories\Eloquents;

use App\Models\User;
use App\Contracts\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;

class EloquentUserRepository extends EloquentBaseRepository implements UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function registerUser($data = [])
    {
        DB::beginTransaction();
        try {
            $data['role'] = ROLE_USER['user'];
            $data['avatar'] = null;
            $data['password'] = bcrypt($data['password']);
            $this->model->create($data);
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
}

