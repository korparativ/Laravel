<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    //
    public function index() {
        //$this->authorize('view-any', User::class);
        Gate::authorize('view-any', User::class);
        return User::all();
    }

    public function show(User $user){
        Gate::authorize('view', $user);
        return $user;
    }
}
