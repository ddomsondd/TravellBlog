@extends('layouts.app')

<style>
    td{ padding: 10px; }
    @media (max-width: 850px) {
        tr {
            width: 400px;
            display: block;
        }
    }
</style>
@section('content')
<div class="container p-5 sm:pl-32 lg:pl-0">
    <div class="flex flex-col lg:flex-row justify-center lg:justify-between lg:gap-2">
        <div class="lg:w-2/5">
            <div class="flex flex-col">
                <div>
                    <h3 class="text-center font-bold text-3xl p-1">{{ $user->name }}'s bio</h3>
                    <div class="p-2 flex flex-col lg:flex-row justify-center items-center">
                    <p class="flex justify-center lg:w-auto w-1/2 text-center">
                        @if($user->bio_photo)
                            <img src="{{ asset('profileImages/' . $user->bio_photo) }}"  class="mx-auto" alt="User Bio Photo" width="300">
                            @else
                            <img src="{{ asset('profileImages/unknown.jpg') }}"  class="mx-auto" alt="User Bio Photo" width="300">
                        @endif
                    </p>
                    
                    </div>

                    <div class="p-9 flex justify-center">
                    <p class="text-center border border-[#e8a2a2] rounded lg:w-auto w-1/2" id="userBio">
                        @if($user->bio)
                            {!! nl2br($user->bio) !!}
                        @else
                            No bio available
                        @endif
                    </p>
                    
                    </div>
                </div>
            </div>
        </div>



        <div class="lg:w-3/5 pt-5 lg:pt-0 lg:pl-5">
            <div>
                <div class="lg:flex lg:justify-center text-center lg:pl-20 xl:pl-20 2xl:pl-32">
                    <h3 class="font-bold text-3xl p-2">{{ $user->name }}'s posts</h3>
                </div>
                <table class="w-full">
    <tbody>
        @foreach($posts as $p)
            <tr class="flex flex-col border rounded border-[#e8a2a2] bg-white">
                <td class="font-bold flex items-center border justify-between text-[17px]">
                    <div class="flex flex-col">
                        <p class="text-gray-700">{{ \App\Models\User::find($p['user_id'])->name }}</p>
                        <p class="text-gray-600 text-[15px]">{{ $p['created_at']->format('d-m-Y') }}</p>
                    </div>
                </td>
                <td class="font-bold text-[17px]">{{ $p['title'] }}</td>
                <td>{!! nl2br($p['content']) !!}</td>
                @if($p['image'])
                    <td><img src="{{ asset('postImages/' . $p['image']) }}" alt="Post Image" class="w-auto"></td>
                @endif
                <td><hr></td>
                <td>
                    @include('layouts.shared.like-button')
                    @include('layouts.shared.comment')</td>
            </tr>
            <tr><td></td></tr>
        @endforeach
    </tbody>
</table>
            </div>
        </div>
    </div>
</div>

@endsection