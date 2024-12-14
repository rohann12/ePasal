<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ePasal-@yield('title')</title>
    <script src="{{ asset('tailwind.jsx') }}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 


</head>


<body>
    <div class="flex flex-row w-screen h-screen overflow-x-hidden">
        @include('layouts.sidebar')
        <div class="flex flex-1 flex-col w-full h-screen overflow-hidden">
            <div class="flex flex-row items-center justify-between w-full h-20 ps-6 border-b border-gray-200 ">
                <div class="flex flex-col gap-y-1">
                    <h3 class="font-semibold lg:text-2xl md:text-xl">@yield('heading')</h3>
                    <span class="text-gray-500 font-normal lg:text-xs md:text-xs">@yield('subheading')</span>
                </div>
                <div class="flex flex-row gap-x-4 relative">
                    {{-- User icon and dropdown --}}
                    <button id="dropdownButton" class="text-gray-300 hover:text-black mr-5 font-medium rounded-lg text-sm text-center inline-flex items-center"
                        type="button">
                        {{-- User icon --}}
                        <div class="h-10 w-10 rounded-full bg-gray-200 ">
                            {{-- Insert image here --}}
                            <img src="{{ asset('logos/profile.svg') }}" alt="Profile Photo" class="rounded-full"
                                style="height:100%;width:100%;object-fit:cover;">
                        </div>
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                
                    <!-- Dropdown menu -->
                    <div id="dropdownMenu"
                        class="z-10 hidden absolute right-6 top-8 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 mt-2">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownButton">
                            <li class="flex items-center px-4 hover:bg-gray-100 hover:text-teal-500">
                                <object type="image/svg+xml" data="{{ asset('logos/profile.svg') }}"
                                    class="text-teal-500">Profile</object>
                                <a href="#" class="block px-2 py-2">Profile</a>
                            </li>
                            <li class="flex items-center px-4 hover:bg-gray-100 hover:text-teal-500">
                                <object type="image/svg+xml" data="{{ asset('logos/settings.svg') }}"
                                    class="text-teal-500">Setting</object>
                                <a href="#" class="block px-2 py-2">Settings</a>
                            </li>
                        </ul>
                        <div
                            class="py-2 flex items-center text-sm text-gray-700 px-4 hover:bg-gray-100 hover:text-teal-500">
                            <object type="image/svg+xml" data="{{ asset('logos/logout.svg') }}"
                                class="text-teal-500"></object>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <script>
                    // JavaScript to toggle the dropdown visibility
                    document.getElementById('dropdownButton').addEventListener('click', function (event) {
                        event.stopPropagation();
                        const dropdown = document.getElementById('dropdownMenu');
                        dropdown.classList.toggle('hidden');
                    });
                
                    // Close dropdown when clicked outside
                    window.addEventListener('click', function (e) {
                        if (!e.target.closest('#dropdownButton') && !e.target.closest('#dropdownMenu')) {
                            document.getElementById('dropdownMenu').classList.add('hidden');
                        }
                    });
                </script>
                

            </div>
            @yield('button')

            <div class="flex flex-col px-6 pt-4 flex-1 min-h-96 bg-gray-50 overflow-x-hidden overflow-y-scroll ">
                <div class="flex flex-col bg-white w-full h-fit rounded-md ">
                    @yield('content')

                </div>

            </div>
        </div>
    </div>

</body>

</html>