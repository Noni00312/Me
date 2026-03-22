@extends('welcome', ['title' => 'Project Management', 'page_title' => 'Project Management'])

@section('content')
    {{-- Create Task Modal --}}
    <div class="rounded-md p-4 bg-surf-30 max-w-[30rem]">
      <div class="flex justify-between items-center">
        <div class="flex items-center gap-2">
          @svg('heroicon-s-folder', 'w-[24px] h-[24px] text-sec-accent')
          <span class="text-sm font-semibold text-white">Create new project</span>
        </div>
        <button class="cursor-pointer">
          @svg('heroicon-s-x-mark', 'w-[20px] h-[20px] text-gray-300')
        </button>
      </div>
      <hr class="rounded-xs text-gray-500 border border-1 my-2">
      <div class="w-full">
        <label for="title" class="text-xs text-gray-300">Title<span class="text-error"> *</span></label>
        <input  type="text"
                name="title"
                id="title"
                class="w-full outline-none border border-gray-300 px-3 py-2 rounded-md focus:border-info placeholder:text-sm
                @error('title')
                  border-error-dark
                  bg-error-light
                  text-error-dark
                @enderror"
                placeholder="Project management system"
                maxlength="255"
                value="{{ old('title') }}"
        >
        <div class="flex w-full justify-between
                  @error('title') justify-between @else justify-end @enderror
                  items-start mt-2">
          @error('title')
            <span class="text-xs text-error">$message</span>
          @enderror
          <p class="char-counter-con text-xs text-gray-400 text-end hidden"><span class="char-counter">0</span>/255</p>
        </div>
      </div>
    </div>

    <div class="py-2 flex items-center justify-between">
        <div class="flex items-center gap-1 border border-gray-300 px-3 py-2 rounded-md">
            @svg('heroicon-o-magnifying-glass', 'w-[20px] h-[20px] text-gray-400')
            <input type="text" class="search-input w-full outline-none" placeholder="Search project">

            <button class=" flex items-center gap-2 px-2 py-1 bg-transparent rounded-md border border-gray-300 hover:bg-gray-600 transition-colors duration-150 ease-in-out cursor-pointer clear-button  border-none hidden">
                @svg('heroicon-o-x-mark', 'w-[18px] h-[18px] text-error ')
            </button>
        </div>
        <div class="flex gap-2">
            <button class="flex items-center gap-2 px-3 py-2 bg-transparent rounded-md border border-white hover:bg-gray-600 transition-colors duration-150 ease-in-out cursor-pointer">
                @svg('heroicon-o-funnel', 'w-[20px] h-[20px] text-white')
                <span class="text-white">{{ __('Filter') }}</span>
            </button>
            {{-- add a dropdown or a modal for filter --}}
            <button class="flex items-center gap-2 px-3 py-2 bg-sec-accent rounded-md hover:bg-sec-600 transition-colors duration-150 ease-in-out cursor-pointer">
                @svg('heroicon-o-plus', 'w-[20px] h-[20px] text-surf-bg')
                <span class="text-surf-bg">{{ __('Create Project') }}</span>
            </button>
        </div>
    </div>

    <div class="w-full h-[calc(100vh-110px)] grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 items-start gap-2 rounded-md overflow-y-auto {{ $projects_count > 0 ? 'pr-2' : '' }}">
        @foreach ($projects as $key => $project)
            <x-card
              title="{{ $project->title }}"
              description="{{ $project->description }}"
              status="{{ $project->status }}"
              project_type="{{ $project->type->name }}"
              progress="{{ $project->progress }}"
              link="{{ $project->link }}"
              date_created="{{ $project->created_at }}"
            />
        @endforeach
    </div>

    <script>
        var clearButton = document.querySelector('.clear-button');
        var searchInput = document.querySelector('.search-input');
        var titleInput = document.getElementById('title');
        var titleCounterCon = document.querySelector('.char-counter-con');
        var titleCounter = document.querySelector('.char-counter');

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

        titleInput.addEventListener('input', function(){

            titleCounter.innerText = this.value.length;

            if(this.value.length > 0) {
              titleCounterCon.classList.remove('hidden');
            }else {
              titleCounterCon.classList.add('hidden');
            }
          })
    </script>
@endsection
