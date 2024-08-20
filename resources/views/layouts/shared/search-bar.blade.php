<div class="card hidden xl:block">
    <div class="card-header">
        <h3 class="text-center text-3xl">Search</h3>
    </div>
    <div class="card-body flex flex-col">
        <form action="{{ route('posts') }}" method="GET">
            <input type="text" name="search" id="search" class="form-control accent-[#e8a2a2]" placeholder="Search for...">
            <div class="flex justify-between">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-dark mt-2 border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300 p-1">Search</button>
                    @if(request()->has('search'))
                        <a href="{{ route('posts') }}" class="btn btn-secondary mt-2 ml-2 border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300 p-1">Clear Search</a>
                    @endif
                </span>
            </div>
        </form>
    </div>
</div>