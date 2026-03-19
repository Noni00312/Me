<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @if (isset($title))
            {{ __($title) }} |
        @endif
        {{ config('app.name', 'Me') }}
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-surf-bg">
    {{-- Main Container --}}
    <div class="grid grid-cols-[256px_1fr] h-screen">
        {{-- Sidebar --}}
        <div id="sidebar" class="h-full w-64 bg-surf-30 overflow-y-auto text-white p-2">
            <h1 class="text-base font-bold mb-4">{{ config('app.name', 'Me') }}</h1> {{-- Change this to actual app icon --}}
            <nav>
                <ul>
                    <li class="w-full mb-2">
                        <a href="#" class="group flex items-center w-full gap-2 p-2 rounded-md hover:bg-sec-accent transition-colors duration-150 ease-in-out">
                            @svg('heroicon-o-clock', 'w-[24px] h-[24px] text-white group-hover:text-surf-bg group-hover:transition-colors duration-150 ease-in-out')
                            <span class="group-hover:text-surf-bg group-hover:transition-colors duration-150 ease-in-out">{{ __('Recent') }}</span>
                        </a>
                    </li>
                    <li class="w-full mb-2">
                        <a href="{{ route('projects.index') }}" class="group flex items-center w-full gap-2 p-2 rounded-md hover:bg-sec-accent transition-colors duration-150 ease-in-out">
                            @svg('heroicon-o-wrench-screwdriver', 'w-[24px] h-[24px] text-white group-hover:text-surf-bg group-hover:transition-colors duration-150 ease-in-out')
                            <span class="group-hover:text-surf-bg group-hover:transition-colors duration-150 ease-in-out">{{ __('Project Management') }}</span>
                        </a>
                    </li>
                    <li class="w-full mb-2">
                        <a href="#" class="group flex items-center w-full gap-2 p-2 rounded-md hover:bg-sec-accent transition-colors duration-150 ease-in-out">
                            @svg('heroicon-o-trophy', 'w-[24px] h-[24px] text-white group-hover:text-surf-bg group-hover:transition-colors duration-150 ease-in-out')
                            <span class="group-hover:text-surf-bg group-hover:transition-colors duration-150 ease-in-out">{{ __('Goal Tracker') }}</span>
                        </a>
                    </li>
                    <li class="w-full">
                        <a href="#" class="group flex items-center w-full gap-2 p-2 rounded-md hover:bg-sec-accent transition-colors duration-150 ease-in-out">
                            @svg('heroicon-o-sparkles', 'w-[24px] h-[24px] text-white group-hover:text-surf-bg group-hover:transition-colors duration-150 ease-in-out')
                            <span class="group-hover:text-surf-bg group-hover:transition-colors duration-150 ease-in-out">{{ __('Learning Tracker') }}</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="w-full h-full p-2">
            <div class="w-full pb-3">
                <h2 class="text-base font-regular text-gray-400">
                    @if (isset($page_title))
                        {{ __($page_title) }}
                    @endif
                </h2>
            </div>

            <div class="w-full h-[calc(100%-32px)]">
                @yield('content')
            </div>
        </div>
    </div>
    @stack('script')
</body>

</html>
