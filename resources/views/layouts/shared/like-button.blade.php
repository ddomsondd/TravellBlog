<script src="https://kit.fontawesome.com/7e2f052637.js" crossorigin="anonymous"></script>

<div class="pl-1">
@if(Auth::user()->likesPost($p))
<form action="{{ route('unlike', $p->id) }}" method="POST">
    @csrf
    <button type="submit" class="flex items-center"><i class="fa-solid fa-heart  text-red-500"></i>
        <span class="ml-2 text-gray-600"></span> {{ $p->likes()->count() }}
    </button>
</form>
@else
<form action="{{ route('like', $p->id) }}" method="POST">
    @csrf
    <button type="submit" class="flex items-center"><i class="fa-regular fa-heart"></i>
        <span class="ml-2 text-gray-600"></span> {{ $p->likes()->count() }}
    </button>
</form>
@endif
</div>