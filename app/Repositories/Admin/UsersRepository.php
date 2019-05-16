<?php

namespace App\Repositories\Admin;


use App\Contracts\Admin\UsersInterface;
use App\User;

class UsersRepository implements UsersInterface
{

    protected $model;

    /**
     * UsersRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * Get all Users
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllUsers($adminId)
    {
        return $this->model->whereNotIn('id', [$adminId])->get();
    }

    /**
     * Update User
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        return $this->model->where('id', $id)->update($data);
    }

    /**
     * Create a new User
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * Delete User
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->where('id', $id)->delete();
    }

    /**
     * Set User role
     * @param $id
     * @param $roleId
     * @return mixed
     */
    public function setRole($id, $roleId)
    {
        return $this->model->where('id', $id)->first()->role()->sync($roleId);
    }

}
