<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use App\Http\Controllers\PostController;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index(){
        $query = Post::orderBy('created_at', 'desc');
        $post = $query->get();
        return view('admin.dashboard', compact('post'));
    }

    public function categories(){
        $categories = Category::all();
        return view('admin.all-categories',compact('categories'));
    }

    public function users(){
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    
    public function destroy_user($id){
        $user = User::find($id);
        if (!$user) {
            toastr()->error(
                'Not found',
                'User',
                [
                    'positionClass' => 'toast-bottom-right',
                    'progressBar' => false,
                    'timeOut' => 3000,
                    'closeButton' => true,
                    'toastClass' => 'custom-toast-class',
                ]
            );
            return redirect()->back();
        }

        $userPosts = Post::where('user_id', $id)->get();
        if ($userPosts->count() > 0) {
            $userPosts->each->delete();
        }

        $userLikes = Like::where('user_id', $id)->get();
        if ($userLikes->count() > 0) {
            $userLikes->each->delete();
        }

        $userComments = Comment::where('user_id', $id)->get();
        if ($userComments->count() > 0) {
            $userComments->each->delete();
        }

        $user->delete();

        toastr()->success(
            'Has been deleted',
            'User',
            [
                'positionClass' => 'toast-bottom-right',
                'progressBar' => false,
                'timeOut' => 3000,
                'closeButton' => true,
                'toastClass' => 'custom-toast-class',
            ]
        );

        return redirect()->back();
    }

    public function change_user_role($id){
        $user = User::find($id);

        if (!$user) {
            toastr()->error(
                'Not found',
                'User',
                [
                    'positionClass' => 'toast-bottom-right',
                    'progressBar' => false,
                    'timeOut' => 3000,
                    'closeButton' => true,
                ]
            );
            return redirect()->back();
        }

        if($user->role == 0){
            $user->role = 1;
        }
        else{
            $user->role = 0;
        }

        $user->save();
        toastr()->success(
            'Has been changed',
            'User\'s role',
            [
                'positionClass' => 'toast-bottom-right',
                'progressBar' => false,
                'timeOut' => 3000,
                'closeButton' => true,
                'toastClass' => 'custom-toast-class',
            ]
        );

        return redirect()->back();
    }
                



    public function deleteCategory($id)
    {
        $category = Category::find($id);

        if (!$category) {
            toastr()->error(
                'Not found',
                'Category',
                [
                    'positionClass' => 'toast-bottom-right',
                    'progressBar' => false,
                    'timeOut' => 3000,
                    'closeButton' => true,
                    'toastClass' => 'custom-toast-class',
                ]
            );
            return redirect()->route('categories');
        }

        $posts = Post::where('category_id', $id)->get();

        if ($posts->count() > 0) {
        // Option 1: Delete the posts along with the category
            //$posts->each->delete();
        
        // Option 2: Reassign the posts to another category
            $newCategory = Category::find(6);
            $posts->each->update(['category_id' => $newCategory->id]);
        }

        $category->delete();

        toastr()->success(
            'Has been deleted',
            'Category',
            [
                'positionClass' => 'toast-bottom-right',
                'progressBar' => false,
                'timeOut' => 3000,
                'closeButton' => true,
                'toastClass' => 'custom-toast-class',
            ]
        );
        return redirect()->back();
    }

    public function addCategory(Request $request){
        //dd($request);
        $request->validate([
            'category_name' => 'required'
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();

        toastr()->success(
            'Has been added',
            'Category',
            [
                'positionClass' => 'toast-bottom-right',
                'progressBar' => false,
                'timeOut' => 3000,
                'closeButton' => true,
                'toastClass' => 'custom-toast-class',
            ]
        );
        return redirect()->back();
    }
}
