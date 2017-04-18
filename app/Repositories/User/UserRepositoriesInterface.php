<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Http\Request;

interface UserRepositoriesInterface
{
    /**
     * Create user
     *
     * @param Request $request
     */
    public function createUser(Request $request);

    /**
     * Delete user
     *
     * @param array $param
     */
    public function destroyUser($param = []);

    /**
     * Update user information
     *
     * @param array $param
     */
    public function updateUser($param = []);

    /**
     * Update user image
     *
     * @param array $param
     * @param Request $request
     */
    public function uploadImage($param = [], Request $request);

    /**
     * Count number of users
     */
    public function countUser();
}
