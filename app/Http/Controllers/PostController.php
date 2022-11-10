<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Services\FileUploadService;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function addNewPost(PostRequest $request): \Illuminate\Http\RedirectResponse {
        $file = FileUploadService::uploadFile('/images/post', $request->file('photo'));

        Post::addNewPost($request->input('content'), $file, Auth::id());
        return redirect('/profile');
    }
}
