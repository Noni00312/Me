@extends('welcome', ['title' => 'Project Management', 'page_title' => 'Project Management'])

@section('content')
    <div class="py-2 flex items-center justify-between">
        <div class="flex items-center gap-1 border border-gray-300 px-3 py-2 rounded-md">
            @svg('heroicon-o-magnifying-glass', 'w-[20px] h-[20px] text-gray-400')
            <input type="text" class="w-full outline-none" placeholder="Search project">

            <button class=" flex items-center gap-2 px-2 py-1 bg-transparent rounded-md border border-gray-300 hover:bg-gray-600 transition-colors duration-150 ease-in-out cursor-pointer clear-button  border-none hidden">
                @svg('heroicon-o-x-mark', 'w-[18px] h-[18px] text-error ')
            </button>
        </div>
        <div class="flex gap-2">
            <button class="flex items-center gap-2 px-3 py-2 bg-transparent rounded-md border border-white hover:bg-gray-600 transition-colors duration-150 ease-in-out cursor-pointer">
                @svg('heroicon-o-funnel', 'w-[24px] h-[24px] text-white')
                <span class="text-white">{{ __('Filter') }}</span>
            </button>
            {{-- add a dropdown or a modal for filter --}}
            <button class="flex items-center gap-2 px-3 py-2 bg-sec-accent rounded-md hover:bg-sec-600 transition-colors duration-150 ease-in-out cursor-pointer">
                @svg('heroicon-o-plus', 'w-[24px] h-[24px] text-surf-bg')
                <span class="text-surf-bg">{{ __('Create Project') }}</span>
            </button>
        </div>
    </div>

    <div class="w-full h-[calc(100vh-110px)] grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 rounded-md overflow-y-auto {{ $projects_count > 0 ? 'pr-2' : '' }}">
        <x-card />
        <x-card />
        <x-card />
        <x-card />
        <x-card />
        <x-card />
        <x-card />
        <x-card />
        <x-card />
        <x-card />
        <x-card />
        <x-card />
    </div>

    <script>
        var clearButton = document.querySelector('.clear-button');
        var searchInput = document.querySelector('input[type="text"]');

        if (clearButton && searchInput) {
            searchInput.addEventListener('input', function() {
                if (this.value.length > 0) {
                    clearButton.classList.remove('hidden');
                } else {
                    clearButton.classList.add('hidden');
                }
            });

            clearButton.addEventListener('click', function() {
                searchInput.value = '';
                clearButton.classList.add('hidden');
                searchInput.focus();
            });
        }
    </script>
@endsection
