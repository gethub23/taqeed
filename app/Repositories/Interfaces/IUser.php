<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface IUser extends IModelRepository
{
    public function signUp(Request $request);

    public function activateUser($user);

    public function forgetPassword($phone,$key);

    public function editPassword($request);
}
