@extends('layouts.app')

<style>
    th, td{ padding: 10px; }

    @media (max-width: 850px) {
        tr {
            width: 400px;
            display: block;
        }
    }
</style>


@section('content')
<div class="flex flex-row-reverse justify-center relative container">

        <div class="p-9 absolute right-5">
            @include('layouts.shared.search-bar')
            <br>
            <br>
            @include('layouts.shared.search-category')
        </div>

    <div class="p-5 w-1/2">
        <!--
        <div class="flex flex-col lg:flex-row justify-center p-1 items-center text-center">
            <div class="flex justify-center text-5xl">
                <h3>View Posts</h3>
            </div>
            <div class="lg:flex lg:justify-end">
                <a href="{{ url('add-post') }}" class="border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300 p-1">Create Post</a>
            </div>
        </div>
-->
        <div class="flex flex-col lg:flex-row justify-center lg:justify-between p-1 items-center text-center">
            <div class="lg:flex lg:justify-center text-5xl lg:pl-32 xl:pl-48 2xl:pl-64">
                <h3>View Posts</h3>
            </div>
            <div>
                <a href="{{ url('add-post') }}" class="border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300 p-1">Create Post</a>
            </div>
        </div>

        <div class="flex flex-row justify-center  w-full">


        <div class="flex justify-center">
                <table class="w-3/4 lg:w-full">
                    <tbody>
                        @foreach($post as $p)
                        @if($p->visible == '1' || (auth()->check() && (auth()->user()->role == '1' || auth()->user()->id == $p->user_id)))
                            <tr class="flex flex-col border rounded border-[#e8a2a2] bg-white">
                                <td class="font-bold flex items-center border justify-between text-[17px]">
                                    <div class="flex flex-col text-gray-700">
                                        @if(auth()->check() && auth()->user()->id == $p->user_id)
                                            <a href="{{ route('home') }}">You</a>
                                        @else
                                            <a href="{{ route('profile', ['userId' => $p->user_id]) }}">{{ \App\Models\User::find($p->user_id)->name }}</a>
                                        @endif
                        
                                    <p class="text-gray-600 text-[15px]">{{ $p->created_at->format('d-m-Y') }}</p>
                                    </div>
                                
                                    <div class="flex gap-2 items-center">
                                        @if(auth()->check() && auth()->user()->id == $p->user_id)
                                            <a href="{{ url('posts'.$p->id) }}" class="border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300 p-1 btn btn-success">Edit</a>
                                        @endif
                                        @if(auth()->check() && (auth()->user()->id == $p->user_id || auth()->user()->role == '1'))
                                            <a onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this post?')){document.getElementById('delete-post-id').submit()}" href="#" class="flex justify-center"><i class="fa-solid fa-trash-can"></i></a>    
                                            <form id="delete-post-id" action="{{ route('delete-post', ['id' => $p['id']]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            @endif
                                    </div>
                                </td>                                
                                <div>
                                    <div>
                                        <td class="flex justify-between items-center">
                                            <p class="font-bold text-[17px]">{{ $p->title }}</p>
                                            @if($p->category_id != NULL)
                                                <p class="border border-gray-700 rounded bg-gray-200 w-fit p-1">{{ \App\Models\Category::find($p->category_id)->category_name }}</p>  
                                            @endif
                                        </td>
                                    </div>

                                    <td>{!! nl2br($p['content']) !!}</td>
                                    @if($p['image'])
                                        <td><img src="{{ asset('postImages/' . $p['image']) }}" alt="Post Image" class="w-auto"></td>
                                    @endif
                                </div>

                                <td><hr></td>
                                
                                <td>
                                    @include('layouts.shared.like-button')
                                    @include('layouts.shared.comment')
                                </td>

                            </tr>
                            <tr><td></td></tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>


@endsection
