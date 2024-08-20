<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

class LikeController extends Controller
{
    public function like(string $id){

        $post = Post::find($id);
        if (!$post) {
            return redirect()->back();
        };
      	
        $like = new Like(); 
        $like->user_id = Auth()->user()->id;
        $like->post_id = $post->id;
        $like->save();
        
        toastr()->success(
            'Liked post!',
            [
                'positionClass' => 'toast-bottom-right',
                'progressBar' => false,
                'timeOut' => 3000,
                'closeButton' => true,
                'toastClass' => 'custom-toast-class',
            ]
        );
        //dd($liker, $post);
        return redirect()->back();
    }

    public function unlike(Post $post){
        $liker = auth()->user();
        $liker->likes()->detach($post->id);

        toastr()->success(
            'Uniked post!',
            [
                'positionClass' => 'toast-bottom-right',
                'progressBar' => false,
                'timeOut' => 3000,
                'closeButton' => true,
                'toastClass' => 'custom-toast-class',
            ]
        );
        //dd(liker);
        return redirect()->back();
    }
}
