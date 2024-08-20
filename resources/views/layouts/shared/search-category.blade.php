<div class="card hidden xl:block">
    <div class="card-header">
        <h3 class="text-center text-3xl">Search category</h3>
    </div>
    <div class="card-body flex flex-col">
        <form action="{{ route('posts') }}" method="GET">
            
            <input type="radio" id="all-inclusive" name="category" value="all-inclusive" class="accent-[#e8a2a2]"><label for="all-inclusive">all-inclusive</label><br>
            <input type="radio" id="low-budget" name="category" value="low-budget" class="accent-[#e8a2a2]"><label for="low-budget">low-budget</label><br>
            <input type="radio" id="tent trip" name="category" value="tent trip" class="accent-[#e8a2a2]"><label for="tent trip">tent trip</label><br>
            <input type="radio" id="camper trip" name="category" value="camper trip" class="accent-[#e8a2a2]"><label for="camper trip">camper trip</label><br>
            <input type="radio" id="city-break" name="category" value="city-break" class="accent-[#e8a2a2]"><label for="city-break">city-break</label><br>
            <input type="radio" id="other" name="category" value="other" class="accent-[#e8a2a2]"><label for="other">other</label><br>

            <div class="flex justify-between">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-dark mt-2 border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300 p-1">Search</button>
                    @if(request()->has('category'))
                        <a href="{{ route('posts') }}" class="btn btn-secondary mt-2 ml-2 border rounded border-[#e8a2a2] bg-[#e8a2a2] hover:bg-white transition-all duration-300 p-1">Clear Search</a>
                    @endif
                </span>
            </div>
        </form>
    </div>
</div>