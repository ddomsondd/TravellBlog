<style>
    @media (max-width: 850px) {
        tr {
            width: 400px;
            display: block;
        }
    }
</style>
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>


<div class="flex flex-col lg:flex-row justify-center lg:justify-between lg:gap-2 w-full">
    <div class="lg:w-2/5">
            <div class="flex flex-col">
                <div>
                    <h3 class="text-center font-bold text-3xl p-1">My bio</h3>

                    <div class="p-2 flex flex-col lg:flex-row justify-center items-center">
                        <p class="flex justify-center lg:w-auto w-1/2 text-center">
                            @if(Auth::user()->bio_photo)
                                <img src="{{ asset('profileImages/' . Auth::user()->bio_photo) }}" class="mx-auto" alt="User Bio Photo" width="300">
                                @else
                                <img src="{{ asset('profileImages/unknown.jpg') }}" class="mx-auto" alt="User Bio Photo" width="300">
                            @endif
                        </p>
                        
                        <form id="photoForm" action="{{ route('update-photo-bio') }}" method="POST" enctype="multipart/form-data" class="hidden p-2 gap-4 w-full">
                            @csrf
                            @method('PUT')
                            <div class="flex flex-col items-center">
                                <div class="inline-block">
                                    <label for="photo" class="font-bold">Image:</label>
                                    <input type="file" name="photo" id="photo" accept="image/*" class="accent-[#e8a2a2] form-control">
                                </div>
                                <div class="flex justify-between gap-2 w-1/2 lg:w-full">
                                    <button type="submit" class="w-1/2 p-1 btn btn-primary mt-3 border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300">Save Photo</button>
                                    <button type="reset" onclick="togglePhotoForm()"  class="w-1/2 p-1 btn btn-primary mt-3 border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="p-9 flex justify-center">
                    <p class="text-center border border-[#e8a2a2] rounded lg:w-auto w-1/2" id="userBio">
                        @if(Auth::user()->bio)
                            {!! nl2br(Auth::user()->bio) !!}
                        @else
                            No bio available
                        @endif
                    </p>
                    <form id="bioForm" class="hidden" action="{{ route('update-bio') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col items-center">
                            <textarea name="bio" id="bio" class="accent-[#e8a2a2] form-control w-full" style="height: 200px;" placeholder="Enter bio">{{ Auth::user()->bio }}</textarea>
                            <div class="flex justify-between gap-2 w-full">
                                <button type="submit" class="w-1/2 p-1 btn btn-primary mt-3 border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300">Update Bio</button>
                                <button type="reset" name="button" id="cancel-button" onclick="toggleBioForm()" class="w-1/2 p-1 btn btn-primary mt-3 border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300">Cancel</button>                        
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="flex justify-center gap-2">
                        <button id="bioButton" class="self-center border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300 p-1 btn btn-success" onclick="toggleBioForm()">Edit Bio</button>
                        <button id="photoButton" class="self-center border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300 p-1 btn btn-success" onclick="togglePhotoForm()">Edit Profile Photo</button>
                    </div>
                    

                </div>
            </div>
        </div>



        <div class="lg:w-3/5 pt-5 lg:pt-0 lg:pl-5">
            <div>
                <div class="flex flex-col lg:flex-row justify-center lg:justify-between w-full p-1 items-center text-center">
                    <div class="lg:flex lg:justify-center text-center lg:pl-32 xl:pl-48 2xl:pl-64">
                        <h3 class="font-bold text-3xl p-2">My posts</h3>
                    </div>
                    <div>
                        <a href="{{ url('add-post') }}" class="border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300 p-1">Create Post</a>
                    </div>
                </div>


                @php
                    $hasPosts = false;
                @endphp

                <table class="w-full">
                    <tbody>
                        @foreach($post as $p)
                            @if(auth()->check() &&  auth()->user()->id == $p['user_id'])
                                @php
                                    $hasPosts = true;
                                @endphp
                                <tr class="flex flex-col border rounded border-[#e8a2a2] bg-white">
                                    <td class="font-bold flex items-center border justify-between text-[17px]">
                                        <div class="flex flex-col">
                                            <p class="text-gray-700">{{ \App\Models\User::find($p['user_id'])->name }}</p>
                                            <p class="text-gray-600 text-[15px]">{{ substr($p['created_at'], 0, 10) }}</p>
                                        </div>
                                    
                                        <div class="flex gap-2 items-center">
                                            @if(auth()->check() && auth()->user()->id == $p['user_id'])
                                                <a href="{{ url('posts'.$p['id']) }}" class="border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300 p-1 btn btn-success">Edit</a>
                                            @endif
                                            @if(auth()->check() && auth()->user()->id == $p['user_id'])
                                                <a onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this post?')){document.getElementById('delete-post-id').submit()}" href="#" class="flex justify-center"><i class="fa-solid fa-trash-can"></i></a>    
                                                <form id="delete-post-id" action="{{ route('delete-post', ['id' => $p['id']]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @endif
                                        </div>
                                    </td>

                                <div>
                                        <td class="flex justify-between items-center">
                                            <p class="font-bold text-[17px]">{{ $p->title }}</p>
                                            <p class="border border-gray-700 rounded bg-gray-200 w-fit p-1">{{ \App\Models\Category::find($p->category_id)->category_name }}</p>  
                                        </td>
                                    </div>

                                <td>{!! nl2br($p['content']) !!}</td>
                                @if($p['image'])
                                    <td><img src="{{ asset('postImages/' . $p['image']) }}" alt="Post Image" class="w-auto"></td>
                                @endif

                                <td><hr></td>

                                <td>
                                    @include('layouts.shared.like-button')
                                    @include('layouts.shared.comment')
                                </td>
                                <tr><td></td></tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                @if(!$hasPosts)
                <div class="lg:-translate-x-28 h-full flex justify-center items-center flex-col text-red-500">
                    <p class="text-xl">No posts found.</p>
                    <i class="fa-solid fa-magnifying-glass fa-2x"></i>
                </div>
                @endif
            </div>
        </div>
    </div>


<script>
    function toggleBioForm() {
        var bioForm = document.getElementById('bioForm');
        var userBio = document.getElementById('userBio');
        var bioButton = document.getElementById('bioButton');
        bioForm.classList.toggle('hidden');
        userBio.classList.toggle('hidden');
        bioButton.classList.toggle('hidden');
    }
    function togglePhotoForm() {
        var photoForm = document.getElementById('photoForm');
        var photoButton = document.getElementById('photoButton');
        photoForm.classList.toggle('hidden');
        photoButton.classList.toggle('hidden');  
    }
</script>

