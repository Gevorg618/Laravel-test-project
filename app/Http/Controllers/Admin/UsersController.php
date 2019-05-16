<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Admin\UsersInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    protected $userRepo;

    /**
     * UsersController constructor.
     * @param UsersInterface $userRepo
     */
    public function __construct(UsersInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }


    /**
     * Show Users home.blade.php
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $users = $this->userRepo->getAllUsers(Auth::id());
        return response()->json($users);
    }

    /**
     * Create User.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->data;
        try {
            $user = $this->userRepo->create($data);
            return response()->json([
                'success' => 1,
                'message' => 'You successfully created user '.$user->name.'.',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => 0,
                'message' => $exception->getMessage(),
            ]);
        }
    }

    /**
     * Update User & set role.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $userId = $request->userId;
        $data = $request->data;
        $roleId = $request->roleId;
        try {
            $this->userRepo->update($userId, $data);
            ($roleId ? $this->userRepo->setRole($userId, $roleId) : '');
            return response()->json([
                'success' => 1,
                'message' => 'You successfully update user .',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => 0,
                'message' => $exception->getMessage(),
            ]);
        }

    }

    /**
     * Delete User by id.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        try {
            $this->userRepo->delete($request->userId);
            return response()->json([
                'success' => 1,
                'message' => 'You successfully delete user.',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => 0,
                'message' => $exception->getMessage(),
            ]);
        }
    }

}
