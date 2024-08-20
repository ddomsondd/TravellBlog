<style>
    @media (max-width: 850px) {
        textarea {
            width: 350px;
            display: block;
        }
    }
</style>

<div>
    <form action="{{ route('comment', $p->id) }}" method="POST">
        @csrf
        <div class="flex flex-col lg:flex-row justify-between items-center">
            <div class="mb-1">
                <textarea name="content" id="content" cols="60" rows="1" class="accent-[#e8a2a2] border rounded border-[#e8a2a2]" placeholder="Write comment..."></textarea>
            </div>
            <div class=" lg:pl-1">
                <button type="submit" class="border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300 p-1 mt-2 lg:mt-0">Comment</button>
            </div>
        </div>
    </form>
    <div class="">
    @foreach($p->comments as $comment)
        <div class="flex justify-between w-full">
            <div class="mb-1 border border-gray-700 bg-gray-200 rounded w-full p-1">
                <div class="flex justify-between">
                    <a href="{{ route('profile', ['userId' => $comment->user_id]) }}">{{ App\Models\User::where('id', $comment->user_id)->first()->name }}</a>

        
                    <div class="pr-1 h-5">
                    <p class="h-fit">{{ $comment->created_at->format('d-m-Y') }} 
                        @if(auth()->check() && (auth()->user()->id == $comment->user_id || auth()->user()->role == '1'))
                            <a onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this comment?')){document.getElementById('delete-comment').submit()}" href="#"><i class="fa-solid fa-trash-can"></i></a>
                            <form id="delete-comment" action="{{ route('delete-comment', ['id' => $comment->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endif
                    </p>
                    </div>
                </div>
                <p class="">{{ $comment->content }}</p>
            </div>
        </div>
    @endforeach
    

    </div>
</div>