<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ePasal-@yield('title')</title>
    <script src="{{ asset('tailwind.jsx') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link rel="icon" href="{{ asset('logos/lo.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/classic/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>


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
                <div class="flex flex-row gap-x-4">
                    {{-- User icon and dropdown --}}
                    <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
                        class="text-gray-300  hover:text-black mr-5 font-medium rounded-lg text-sm text-center inline-flex items-center"
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
                    <div id="dropdownDivider"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                        <ul class="py-2  text-sm text-gray-700 " aria-labelledby="dropdownDividerButton">
                            <li class="flex items-center px-4 hover:bg-gray-100 hover:text-teal-500">
                                <object type="image/svg+xml" data="{{ asset('logos/profile.svg') }}"
                                    class="text-teal-500">Profile</object>
                                <a href="#" class="block px-2 py-2 ">Profile</a>
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

                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>

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