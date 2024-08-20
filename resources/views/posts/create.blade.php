@extends('layouts.app')

@section('content')
<div class="flex justify-center container">
    <div class="p-5 w-1/2">
        <div class="flex flex-col lg:flex-row justify-center lg:justify-between p-1 items-center text-center">
            <div class="lg:flex lg:justify-center text-5xl lg:pl-32 xl:pl-48 2xl:pl-64">
                <h3>Create Post<h3>
            </div>
            <div>
                <a href="{{ url('posts') }}" class="border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300 p-1">BACK</a>
            </div>
        </div>

        

        @auth
            <div class="flex justify-center flex-col w-full text-center items-center">
            <div class="col-md-6 ">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div style="color: red;">
                                <li>{{ $error }}</li>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>


                <form action="{{ url('add-post') }}" method="POST"  enctype="multipart/form-data"  class="flex flex-col gap-4 w-full">
                    @csrf
                    
                    <div class="flex flex-col gap-4 text-center w-full justify-center" >
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="accent-[#e8a2a2] form-control">
                            <option value="">--Select Category--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="accent-[#e8a2a2] form-control" required placeholder="Enter title">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" class="accent-[#e8a2a2] form-control" required style="height: 200px;" placeholder="Enter content..."></textarea>
                        <label for="image">Add photo:</label>
                        <input type="file" name="image" id="image" accept="image/*" class="accent-[#e8a2a2] form-control">
                        
                        <div class="w-full flex justify-center gap-2">
                            <input type="checkbox" name="visible" id="visible" class="accent-[#e8a2a2] form-control" placeholder="Enter visible">
                            <label class="" for="visible">
                                    {{ __('Visible') }}
                            </label>
                        </div>
                        <button type="submit" class="w-1/2 self-center p-1 btn btn-primary mt-3 border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300">Save Post</button>
                    </div>
                </form>
            
            </div>
        @else
            <div class="flex justify-center p-5">
                <p class="text-red-500">You must be logged in to create a post. Please <a href="{{ route('login') }}" class="underline">login</a> or <a href="{{ route('register') }}" class="underline">register</a>.</p>
            </div>
        @endauth

       
    </div>
</div>

@if ($errors->any())
    <script>
        var errors = @json($errors->all());
    </script>
@endif

<script>
    if (typeof errors !== 'undefined') {
        errors.forEach(function(error) {
            toastr.error(
                error, 'Validation Error', 
                {
                    'positionClass': 'toast-bottom-right', 
                    'timeOut': 5000,
                    'closeButton': true, 
                    'toastClass': 'custom-toast-class',
                }
            );
        });
    }        
</script>

@endsection