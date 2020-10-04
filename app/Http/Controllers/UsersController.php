<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getUser($id) {
        return User::with("permissions")->where("id", $id)->first();
    }

    public function getUsers() {
        return User::with("permissions")->get();
    }

    public function changePermissions(Request $request) {
        $user = User::with("permissions")->where("id", $request->id)->first();
        if (!isset($user->permissions->id)) {
            $permissions = new Permissions();
            $permissions->user_id = $user->id;
        } else {
            $permissions = Permissions::where("id", $user->permissions->id)->first();
        }
        $permissions->permissions = $request->permissions;
        $permissions->save();
        return true;
    }
}
