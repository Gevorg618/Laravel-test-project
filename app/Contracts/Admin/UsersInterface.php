<?php


namespace App\Contracts\Admin;


interface UsersInterface

{
    public function getAllUsers($adminId);


    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data);

    /**
     * @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $id
     * @param $roleId
     * @return mixed
     */
    public function setRole($id, $roleId);
}
