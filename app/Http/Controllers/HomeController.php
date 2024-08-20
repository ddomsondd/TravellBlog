<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        $query = Post::orderBy('created_at', 'desc');

        $post = $query->get();
        /*
        $post = new PostController();
        $data = $post->fetchAll();
        if($data instanceof \Illuminate\Http\JsonResponse){
            $post = $data->getData(true);
        }
        */
        //dd($post);
        return view('home', compact('post'));
    }

    
    public function updateBio(Request $request){
        //dd($request);
        $request->validate([
            'bio' => 'required|string|max:255',
        ]);
        Auth::user()->update(['bio' => $request->input('bio')]);
        toastr()->success(
            'Has been updated!',
            'Your bio',
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
    
    public function updatePhotoBio(Request $request){
        //dd($request);
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->photo->extension();  
        $request->photo->move(public_path('profileImages'), $imageName);
        Auth::user()->update(['bio_photo' => $imageName]);
        toastr()->success(
            'Has been updated!',
            'Your profile photo',
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
