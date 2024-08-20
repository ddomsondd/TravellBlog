<nav class="flex items-center justify-between flex-wrap bg-[#e8a2a2] p-6">
    <div class="flex items-center flex-shrink-0 text-black">
        @auth
            <a class="font-semibold text-3xl tracking-tight" href="{{ url('/posts') }}" style="font-family: Sacramento, sans-serif;">
                {{ config('app.name', 'vivid voyages') }}
            </a>
        @else
            <a class="font-semibold text-3xl tracking-tight" href="{{ url('/') }}" style="font-family: Sacramento, sans-serif;">
                {{ config('app.name', 'vivid voyages') }}
            </a>
        @endauth
    </div>
        <div>
            @guest
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-[#e8a2a2] hover:bg-white mt-4 lg:mt-0 transition-all duration-300">Login</a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-[#e8a2a2] hover:bg-white mt-4 lg:mt-0 transition-all duration-300">Register</a>
                @endif
            @else

                <div class="relative group inline-block text-sm">
                    @if(auth()->check() && auth()->user()->role == '1')
                        <a id="navbarDropdown" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-[#e8a2a2] hover:bg-white mt-4 lg:mt-0 transition-all duration-300" href="{{ url('admin/dashboard') }}"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}</a>
                    @else
                        <a id="navbarDropdown" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-[#e8a2a2] hover:bg-white mt-4 lg:mt-0 transition-all duration-300" href="{{ url('home') }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>    
                        {{ Auth::user()->name }}
                        </a>
                    @endif

                    <div class="absolute hidden bg-white border rounded border-[#e8a2a2] text-gray-700 pt-1 group-hover:block">
                        <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-700 transition-all duration-300" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</nav>