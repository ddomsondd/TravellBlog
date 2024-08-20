<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function show($userId){
        $user = User::find($userId);
        $posts = Post::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
        
        //dd($user, $posts);
        return view('profile', compact('user', 'posts'));
    }
}
