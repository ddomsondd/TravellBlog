<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function comment(string $id, Request $request){
        $post = Post::find($id);
        $comment = new Comment;
        $comment->post_id = $post->id;
        $comment->user_id = Auth()->user()->id;
        $comment->content = $request->content;
        //dd($comment, $request);
        $comment->save();

        toastr()->success(
            'Has been created',
            'Your comment',
            [
                'positionClass' => 'toast-bottom-right',
                'progressBar' => false,
                'timeOut' => 3000,
                'closeButton' => true,
                'toastClass' => 'custom-toast-class',
            ]
        );

        return redirect()->route('posts');
    }

    public function destroy_comment($id){
        $comment = Comment::find($id);
        $comment->delete();
        toastr()->success(
            'Has been deleted',
            'Your comment',
            [
                'positionClass' => 'toast-bottom-right',
                'progressBar' => false,
                'timeOut' => 3000,
                'closeButton' => true,
                'toastClass' => 'custom-toast-class',
            ]
        );
        return redirect()->route('posts');
    }
}
