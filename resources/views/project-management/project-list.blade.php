@extends('welcome', ['title' => 'Project Management', 'page_title' => 'Project Management'])

@section('content')
    {{-- Create Task Modal --}}
    <div class="create-modal rounded-md p-4 bg-surf-30 w-[30rem] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 shadow-lg shadow-pri-accent/20 transition-all east-in-out  duration-150 invisible scale-80 opacity-0">
      <div class="flex justify-between items-center">
        <div class="flex items-center gap-2">
          @svg('heroicon-s-folder', 'w-[24px] h-[24px] text-sec-accent')
          <span class="text-sm font-semibold text-white">Create new project</span>
        </div>
        <button class="close-modal-button cursor-pointer">
          @svg('heroicon-s-x-mark', 'w-[20px] h-[20px] text-gray-300')
        </button>
      </div>
      <hr class="rounded-xs text-gray-500 border border-1 my-2">
      @csrf
      <form action="" method="POST">
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
        <div class="w-full">
          <label for="link" class="text-xs text-gray-300">Link</label>
          <input  type="text"
                  name="link"
                  id="link"
                  class="w-full outline-none border border-gray-300 px-3 py-2 rounded-md focus:border-info placeholder:text-sm
                  @error('link')
                    border-error-dark
                    bg-error-light
                    text-error-dark
                  @enderror"
                  placeholder="Add project additional link"
                  value="{{ old('link') }}"
          >
          <div class="flex w-full justify-between
                    @error('link') justify-between @else justify-end @enderror
                    items-start mt-2">
            @error('link')
              <span class="text-xs text-error">$message</span>
            @enderror
          </div>
        </div>
        <div class="w-full ">
          <label for="description" class="text-xs text-gray-300">Description</label>
          <textarea
                  name="description"
                  id="description"
                  class="w-full outline-none border border-gray-300 px-3 py-2 rounded-md focus:border-info placeholder:text-sm
                  @error('description')
                    border-error-dark
                    bg-error-light
                    text-error-dark
                  @enderror mb-0"
                  placeholder="This project is good for development."
                  maxlength="1000"
                  value="{{ old('description') }}"
          ></textarea>
          <div class="flex w-full justify-between
                    @error('description') justify-between @else justify-end @enderror
                    items-start mt-2">
            @error('description')
              <span class="text-xs text-error">$message</span>
            @enderror
            <p class="textarea-char-counter-con text-xs text-gray-400 text-end hidden"><span class="textarea-char-counter">0</span>/1000</p>
          </div>
        </div>
        <button type="submit" class="w-full text-center px-3 py-2 bg-sec-accent rounded-md hover:bg-sec-600 transition-colors duration-150 ease-in-out cursor-pointer  mb-2">
            <span class="text-surf-bg">{{ __('Create Project') }}</span>
        </button>
        <button type="button" class="w-full text-center px-3 py-2 bg-transparent rounded-md border border-white hover:bg-gray-600 transition-colors duration-150 ease-in-out cursor-pointer">
            <span class="text-white">{{ __('Cancel') }}</span>
        </button>
      </form>
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
            <button class="create-modal-button flex items-center gap-2 px-3 py-2 bg-sec-accent rounded-md hover:bg-sec-600 transition-colors duration-150 ease-in-out cursor-pointer">
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
      window.addEventListener('DOMContentLoaded', function () {
        const clearButton = document.querySelector('.clear-button');
        const searchInput = document.querySelector('.search-input');
        const titleInput = document.getElementById('title');
        const titleCounterCon = document.querySelector('.char-counter-con');
        const titleCounter = document.querySelector('.char-counter');
        const textareaInput = document.getElementById('description');
        const textareaCounterCon = document.querySelector('.textarea-char-counter-con');
        const textareaCounter = document.querySelector('.textarea-char-counter');
        const createModal = document.querySelector('.create-modal');
        const createProjectButton = document.querySelector('.create-modal-button');
        const closeModalButton = document.querySelector('.close-modal-button');

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
        });

        textareaInput.addEventListener('input', function() {
          textareaCounter.innerText = this.value.length;
          if(this.value.length > 0) {
            textareaCounterCon.classList.remove('hidden');
          }else {
            textareaCounterCon.classList.add('hidden');
          }
        })

        createProjectButton.addEventListener('click', openModal);

        closeModalButton.addEventListener('click', closeModal);

        function openModal() {
          if(!createModal.classList.contains('open')) {
            createModal.classList.remove('invisible');
            createModal.classList.remove('close');
            createModal.classList.add('open');
            createModal.classList.remove('scale-80', 'opacity-0')
            createModal.classList.add('scale-100', 'opacity-100')
          }
        }

        function closeModal() {
          if(createModal.classList.contains('open')) {
            createModal.classList.add('invisible');
            createModal.classList.remove('open');
            createModal.classList.add('scale-80', 'opacity-0')
            createModal.classList.remove('scale-100', 'opacity-100')
          }
        }
      })
    </script>
@endsection
