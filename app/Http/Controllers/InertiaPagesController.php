<?php

namespace App\Http\Controllers;

use App\Models\{Post, User};

class InertiaPagesController extends Controller
{
    public function index(): \Inertia\Response|\Inertia\ResponseFactory{
        return inertia('Profile', [
            'posts' => User::find(\Illuminate\Support\Facades\Auth::id())
                ->getPosts
        ]);
    }

    public function viewHomepage(): \Inertia\Response|\Inertia\ResponseFactory{
        return inertia('Homepage', [
            'posts' => Post::with(['getUser', 'getUserProfileInfo'])
                ->orderBy('id', 'desc')
                ->get()
        ]);
    }
}
