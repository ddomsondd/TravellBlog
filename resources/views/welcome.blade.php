<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>vivid voyages</title>

        <script src="https://kit.fontawesome.com/7e2f052637.js" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <!--
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sacramento">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Courier+Prime">
        <!-- Styles -->
        <style>
            body{background-color: #f7f5eb; font-family: 'Arial', sans-serif;}
            h1{font-family: 'Sacramento', sans-serif}
            h2{font-family: 'Courier Prime', monospace}
        </style>
        <!-- Scripts -->
        @vite('resources/css/app.css')
    </head>

<body class="antialiased">
    <div class="p-6" style="height: 40px;">
        @if (Route::has('login'))
            <div class="flex justify-end">
                @auth
                    @if(auth()->check() && auth()->user()->role == '1')
                        <a href="{{ url('admin/dashboard') }}" class="text-sm px-4 py-2 leading-none border rounded text-white border-[#e8a2a2] bg-[#e8a2a2] hover:text-[#e8a2a2] hover:bg-white mt-4 lg:mt-0 transition-all duration-300" style="font-family: Courier Prime">Home</a>
                    @else
                        <a href="{{ url('/home') }}" class="text-sm px-4 py-2 leading-none border rounded text-white border-[#e8a2a2] bg-[#e8a2a2] hover:text-[#e8a2a2] hover:bg-white mt-4 lg:mt-0 transition-all duration-300" style="font-family: Courier Prime">Home</a>
                    @endif
                        @else
                            <div class="">
                            <a href="{{ route('login') }}" class="text-sm px-4 py-2 leading-none border rounded text-white border-[#e8a2a2] bg-[#e8a2a2] hover:text-[#e8a2a2] hover:bg-white mt-4 lg:mt-0 mx-1 transition-all duration-300" style="font-family: Courier Prime">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm px-4 py-2 leading-none border rounded text-white border-[#e8a2a2] bg-[#e8a2a2] hover:text-[#e8a2a2] hover:bg-white mt-4 lg:mt-0 mx-1 transition-all duration-300" style="font-family: Courier Prime">Register</a>
                            @endif
                            </div>
                    @endauth
                </div>
            @endif
        </div>
                


        <div class="flex justify-center font-extrabold tracking-widest text-4xl md:text-5xl cursor-default"><h1>vivid voyages</h1></div>
            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 pr-10 pl-10 cursor-default">
                    <div class="grid grid-cols-5 p-6 bg-[#e8a2a2] hover:bg-[#eac7c7]  rounded-lg shadow-2xl motion-safe:hover:scale-[1.01] transition-all duration-300">
                            

                        <h2 class="mt-6 col-span-1 text-xl font-semibold text-gray-900 dark:text-white text-center"><i class="fa-solid fa-location-dot text-2xl"></i><br>Share your experiences</h2>

                        <p class="pl-3 col-span-4 mt-2 text-white dark:text-white text-sm leading-relaxed">
                            Want to find a nice travel community? You're in the right spot! Join our travel tribe, where the adventure never ends. Connect with other wanderers, swap stories, snag some travel wisdom, and craft memories that'll make your inbox jealous. It's not just a community - it's your passport to awesome times!
                        </p>
                    </div>


                    <div class="grid grid-cols-5 p-6 bg-[#e8a2a2] hover:bg-[#eac7c7]  rounded-lg shadow-2xl motion-safe:hover:scale-[1.01] transition-all duration-300 ">
                                

                        <h2 class="mt-6  col-span-1 text-xl font-semibold text-gray-900 dark:text-white text-center"><i class="fa-solid fa-earth-americas text-2xl"></i><br>Find inspiration</h2>
                                
                            <p class="pl-3 col-span-4 mt-4 text-white dark:text-white text-sm leading-relaxed">
                                Not sure where to go or what to do in certain places? Easily find inspiration by reading about others' trips! Discover your next adventure through travel stories, and gather inspiration and practical tips from fellow travelers worldwide 
                            </p>
                    </div>


                    <div class="grid grid-cols-5 p-6 bg-[#e8a2a2] hover:bg-[#eac7c7]  rounded-lg shadow-2xl motion-safe:hover:scale-[1.01] transition-all duration-300">
                    
                        <h2 class="mt-6 col-span-1 text-xl font-semibold text-gray-900 dark:text-white text-center"><i class="fa-regular fa-handshake text-2xl"></i><br>Help others</h2>

                            <p class="pl-3  col-span-4 mt-4 text-white dark:text-white text-sm leading-relaxed">
                                Your experiences can be a goldmine for fellow adventurers itching to kickstart their journeys! Share the deets on costs, drop wisdom and be the guiding star for those taking their first steps into the world of travel. Your insights can turn someone else's trip from good to legendary!
                            </p>
                    </div>
                        

                    <div class="grid grid-cols-5 p-6 bg-[#e8a2a2] hover:bg-[#eac7c7]  rounded-lg shadow-2xl motion-safe:hover:scale-[1.01] transition-all duration-300 ">
                        <h2 class="mt-6 col-span-1 text-xl font-semibold text-gray-900 dark:text-white text-center"><i class="fa-regular fa-pen-to-square text-2xl"></i><br>Create your journal!</h2>

                            <p class="pl-3 col-span-4 mt-4 text-white dark:text-white text-sm leading-relaxed">
                                Don't want those amazing travel moments to fade away? Start your adventure journal right here! Blog about your experiences, share the sights you've seen, and let the world join you on your unforgettable journey. Your stories matter, and this is the perfect place to give them a home!
                            </p>
                            
                    </div>
                </div>
            </div>
        </div>

       <!-- @include('layouts.shared.footer')-->
        </div>
    </div>
</body>
</html>