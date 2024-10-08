<?php

namespace App\Http\Controllers;

use App\Models\User;

class TestController extends Controller
{
    public function show_user()
    {
        $users = User::with('posts')->get();

        return $users;
    }
}
