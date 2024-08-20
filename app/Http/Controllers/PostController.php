<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use App\Http\Controllers\PostController;

class PostController extends Controller
{
    public function index(){
        $query = Post::orderBy('created_at', 'desc');

        if(request()->has('search')){
            $query->where('content', 'like', '%' . request()->get('search') . '%');
        }

        if(request()->has('category')){
            $categoryName = request()->get('category');
            $query->whereHas('category', function($q) use ($categoryName) {
                $q->where('category_name', 'like', $categoryName);
            });
        }
        $post = $query->get();

        //dd($post);
        return view('posts.index', compact('post'));
    }

    public function create(){
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(PostFormRequest $request){
       $data = $request->validated();
        //dd($data);
        
        $post = new Post;
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->category_id = $data['category_id'];
        $post->visible = $request->visible == true ? '1' : '0';
        $post->user_id = auth()->user()->id;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('postImages'), $imageName);
            $post->image = $imageName;
        }

        $post->save();
        toastr()->success(
            'Has been created',
            'Your post',
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

    public function edit($id){
        $post = Post::find($id);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(PostFormRequest $request, $id){
        $data = $request->validated();
        
        //dd($data);
        $post = Post::find($id);
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->category_id = $data['category_id'];
        $post->visible = $request->visible == true ? '1' : '0';
        $post->user_id = auth()->user()->id;
        if ($request->hasFile('newImage')) {
            $imageName = time().'.'.$request->newImage->extension();  
            $request->newImage->move(public_path('postImages'), $imageName);
            $post->image = $imageName;
        }

        $post->update();
        toastr()->success(
            'Has been updated',
            'Your post',
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

    public function destroy($id){
        $post = Post::find($id);
        $post->likes()->detach();
        $post->delete();
        toastr()->success(
            'Has been deleted',
            'Your post',
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

    
    public static function fetchAll()
    {
        //$posts = Post::all();
        $posts = Post::orderBy('created_at', 'desc')->get();
        return response()->json($posts);
    }

}
